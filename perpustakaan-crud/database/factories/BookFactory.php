<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), // Judul buku acak
            'author' => $this->faker->name,      // Penulis acak
            'published_year' => $this->faker->year, // Tahun terbit acak
            'member_id' => null, // Bisa null jika tidak dipinjam
        ];
    }
}