@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Daftar Anggota</h1>

    <!-- Tombol Tambah Anggota -->
    <a href="{{ route('members.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Anggota</a>

    <!-- Tabel Daftar Anggota -->
    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">No Telepon</th>
                <th class="border px-4 py-2">Detail</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $member->id }}</td>
                <td class="border px-4 py-2">{{ $member->name }}</td>
                <td class="border px-4 py-2">{{ $member->email }}</td>
                <td class="border px-4 py-2">{{ $member->phone }}</td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('members.show', $member->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Detail</a>
                </td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('members.edit', $member->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="border px-4 py-2 text-center text-gray-500">Belum ada anggota yang terdaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection