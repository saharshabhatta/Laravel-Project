<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'return_by',
        'is_overdue',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Check if the borrowed book is overdue.
    public function checkOverdue()
    {
        if ($this->return_by && Carbon::now()->greaterThan($this->return_by)) {
            return true;
        }
        return false;
    }

    //Automatically updates the `is_overdue` field whenever the model is saved
    public static function booted()
    {
        static::saved(function ($borrowedBook) {
            $isOverdue = $borrowedBook->checkOverdue();

            if ($isOverdue !== $borrowedBook->is_overdue) {
                $borrowedBook->update(['is_overdue' => $isOverdue]);
            }
        });
    }
}
