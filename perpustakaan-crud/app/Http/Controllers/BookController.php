<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = \App\Models\Book::with('categories', 'member');

    // Filter berdasarkan kategori
    if ($request->has('category') && $request->category) {
        $query->whereHas('categories', function ($q) use ($request) {
            $q->where('categories.id', $request->category);
        });
    }

    $books = $query->get();

    $categories = \App\Models\Category::all(); // Ambil semua kategori untuk dropdown filter

    return view('books.index', compact('books', 'categories')); // Kirim data ke view
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'published_year' => 'required|integer|digits:4',
        'categories' => 'array', // Validasi array untuk kategori
        'member_id' => 'nullable|exists:members,id', // Validasi member_id

    ]);

    $book = Book::create($request->only('title', 'author', 'published_year', 'member_id'));
    $book->categories()->sync($request->categories); // Simpan relasi kategori
    return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = \App\Models\Category::all(); // Ambil semua kategori
    $members = \App\Models\Member::all(); // Ambil semua anggota
    
    return view('books.create', compact('categories', 'members')); // Kirim variabel ke view
}


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
{
    $categories = \App\Models\Category::all(); // Ambil semua kategori
    $members = \App\Models\Member::all(); // Ambil semua anggota

    return view('books.edit', compact('book', 'categories', 'members')); // Kirim variabel ke view
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
{
    $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'published_year' => 'required|integer|digits:4',
        'categories' => 'array', // Validasi array untuk kategori
        'member_id' => 'nullable|exists:members,id', // Validasi member_id

    ]);

    $book->update($request->only('title', 'author', 'published_year' , 'member_id'));
    $book->categories()->sync($request->categories); // Perbarui relasi kategori
    return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete(); // Hapus buku dari database
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
