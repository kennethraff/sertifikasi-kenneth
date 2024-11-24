<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:members',
            'phone' => 'nullable|max:15',
        ]);

        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'nullable|max:15',
        ]);

        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus!');
    }

    public function show(Member $member)
{
    // Ambil daftar buku yang dipinjam oleh anggota
    $books = $member->books()->with('categories')->get(); // Sertakan kategori buku
    return view('members.details', compact('member', 'books'));
}
}
