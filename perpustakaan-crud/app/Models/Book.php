<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory; 
    /**
     * Relasi ke model Category (Many-to-Many)
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    /**
     * Relasi ke model Member (One-to-Many)
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * Atribut yang dapat diisi (Mass Assignment)
     */
    protected $fillable = ['title', 'author', 'published_year', 'member_id'];
}