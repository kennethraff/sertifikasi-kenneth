@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Detail Anggota</h1>

    <!-- Informasi Anggota -->
    <div class="mb-4">
        <strong>Nama:</strong> {{ $member->name }}
    </div>
    <div class="mb-4">
        <strong>Email:</strong> {{ $member->email }}
    </div>
    <div class="mb-4">
        <strong>No Telepon:</strong> {{ $member->phone ?? 'Tidak tersedia' }}
    </div>

    <!-- Daftar Buku yang Dipinjam -->
    <h2 class="text-2xl font-semibold mb-4">Buku yang Dipinjam</h2>
    @if($books->isEmpty())
        <p class="text-gray-500">Belum ada buku yang dipinjam oleh anggota ini.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Penulis</th>
                    <th class="border px-4 py-2">Tahun Terbit</th>
                    <th class="border px-4 py-2">Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
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
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Tombol Kembali -->
    <a href="{{ route('members.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block">Kembali ke Daftar Anggota</a>
</div>
@endsection