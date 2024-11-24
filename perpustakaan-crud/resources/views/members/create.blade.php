@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Tambah Anggota</h1>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama:</label>
            <input type="text" id="name" name="name" class="w-full border rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" class="w-full border rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700">No Telepon:</label>
            <input type="text" id="phone" name="phone" class="w-full border rounded px-4 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('members.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
    </form>
</div>
@endsection