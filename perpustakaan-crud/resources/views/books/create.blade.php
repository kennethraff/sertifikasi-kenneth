@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Buku</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Judul:</label>
            <input type="text" id="title" name="title" class="w-full border rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-gray-700">Penulis:</label>
            <input type="text" id="author" name="author" class="w-full border rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="published_year" class="block text-gray-700">Tahun Terbit:</label>
            <input type="number" id="published_year" name="published_year" class="w-full border rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
   
    <div class="mb-4">
    <label for="categories" class="block text-gray-700">Kategori:</label>
    <div class="flex flex-wrap">
        @foreach ($categories as $category)
            <div class="mr-4 mb-2">
                <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="mr-2">
                <label for="category_{{ $category->id }}">{{ $category->name }}</label>
            </div>
        @endforeach
    </div>
</div>

    <div class="mb-4">
    <label for="member_id" class="block text-gray-700">Peminjam (Anggota):</label>
    <select id="member_id" name="member_id" class="w-full border rounded px-4 py-2">
        <option value="">Tidak Dipinjam</option>
        @foreach ($members as $member)
            <option value="{{ $member->id }}" 
                @if(isset($book) && $book->member_id == $member->id) selected @endif>
                {{ $member->name }}
            </option>
        @endforeach
    </select>
</div>
</div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
    </form>
</div>
@endsection