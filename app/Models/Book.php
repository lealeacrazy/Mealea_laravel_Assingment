<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books'; // Specify the table name if it differs from the default
    protected $fillable = [
        'title',
        'description',
        'authorId',
        'publicationYear',
        'genre',
        'created_at',
        'updated_at',
    ];
}
