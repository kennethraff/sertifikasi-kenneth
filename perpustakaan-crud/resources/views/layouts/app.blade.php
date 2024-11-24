<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Kategori')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto">
        <a href="{{ url('/') }}" class="font-bold">Home</a>
            <!-- <a href="{{ route('categories.index') }}" class="font-bold">Home</a> -->
        </div>
    </nav>
    <main class="container mx-auto mt-6">
        @yield('content')
    </main>
</body>
</html>