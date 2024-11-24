<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Perpustakaan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto">
            <h1 class="text-white text-2xl font-bold">Perpustakaan</h1>
        </div>
    </nav>
    <div class="container mx-auto mt-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-blue-700 mb-4">Selamat Datang di Aplikasi Perpustakaan</h1>
            <p class="text-gray-600 mb-6">Soal Ujian Praktek Sertifikasi Novemeber 2024 - Kenneth Raffelino - 0706012110005            .</p>
            <div class="grid grid-cols-3 gap-4">
                <a href="{{ route('categories.index') }}" class="bg-green-500 text-white p-4 rounded hover:bg-green-600">Kelola Kategori</a>
                <a href="{{ route('books.index') }}" class="bg-blue-500 text-white p-4 rounded hover:bg-blue-600">Kelola Buku</a>
                <a href="{{ route('members.index') }}" class="bg-yellow-500 text-white p-4 rounded hover:bg-yellow-600">Kelola Anggota</a>
            </div>
        </div>
    </div>
</body>
</html>