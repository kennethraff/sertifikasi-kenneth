@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Daftar Buku</h1>

    <!-- Filter Kategori -->
    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="flex items-center space-x-4">
            <label for="category" class="block text-gray-700">Filter Kategori:</label>
            <select name="category" id="category" class="border border-gray-300 rounded px-4 py-2">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        </div>
    </form>

    <!-- Tombol Tambah Buku -->
    <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Buku</a>

    <!-- Tabel Daftar Buku -->
    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Penulis</th>
                <th class="border px-4 py-2">Tahun Terbit</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Dipinjam Oleh</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $book->id }}</td>
                <td class="border px-4 py-2">{{ $book->title }}</td>
                <td class="border px-4 py-2">{{ $book->author }}</td>
                <td class="border px-4 py-2 text-center">{{ $book->published_year }}</td>
                <td class="border px-4 py-2">
                    @foreach ($book->categories as $category)
                        <span class="bg-green-200 px-2 py-1 rounded">{{ $category->name }}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">
                    @if ($book->member_id)
                        {{ $book->member->name }}
                    @else
                        Tidak Dipinjam
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="border px-4 py-2 text-center text-gray-500">Belum ada buku yang terdaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection