<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Pastikan semua kolom memiliki nilai yang sesuai
        Book::factory()->count(10)->create([
            'title' => 'Bebas', // Ganti dengan nilai dummy
            'author' => 'John Doe',
            'published_year' => 2023,
            'member_id' => null, // Bisa null jika tidak dipinjam
        ]);
    }
}