<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class UserDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // Retrieve the logged-in user
        $user = Auth::user();
        $searchQuery = $request->input('search', '');

        // Query to get books based on search input
        $books = Book::when($searchQuery, function ($query) use ($searchQuery) {
            return $query->where('name', 'like', '%' . $searchQuery . '%');
        })
            ->orderBy('genre')
            ->paginate(10);

        return view('user.dashboard', compact('user', 'books', 'searchQuery'));
    }

}
