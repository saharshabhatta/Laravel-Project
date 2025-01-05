<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'review',
        'publisher_review',
        'author_review',
    ];

   // Get the book that owns the review.
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    //Get the user who wrote the review.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
