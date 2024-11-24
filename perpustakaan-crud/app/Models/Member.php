<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    public function books() {
        return $this->hasMany(Book::class);
    }

    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];
}
