<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AdminPortalController extends Controller
{
    public function showDashboard()
    {
        $userName = auth()->check() ? auth()->user()->name : 'Guest';

        // Count the total number of registered users
        $totalUsers = User::count();

        // Count the total number of books available
        $totalBooks = Book::count();

        // Count the total number of borrowed books
        $borrowedBooksCount = BorrowedBook::count();

        // Calculate the number of overdue books
        $overdueBooksCount = BorrowedBook::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->whereNotNull('return_by')
                    ->where('return_by', '<', now());
            })
            ->orWhere(function ($subQuery) {
                $subQuery->where('is_overdue', true);
            });

        $overdueBooksCount = $overdueBooksCount->count();

        return view('admin.adminportal', compact('userName', 'totalUsers', 'totalBooks', 'borrowedBooksCount', 'overdueBooksCount'));
    }
}
