<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\BorrowedBook;
use App\Models\Review;
use Carbon\Carbon;

class BookController extends Controller
{
    // Display the list of books
    public function index()
    {
        $books = Book::all();

        return view('admin.book', compact('books'));
    }

    // Show the form to create a new book
    public function create()
    {
        $authors = Book::select('author')->distinct()->get();
        $publishers = Book::select('publisher')->distinct()->get();

        return view('admin.create-book', compact('authors', 'publishers'));
    }

    // Store a new book in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'isbn' => 'nullable|string|max:255',
        ]);

        // Handle the file upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create a new book
        $book = new Book();
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->published_date = $request->input('published_date');
        $book->genre = $request->input('genre');
        $book->photo = $photoPath;
        $book->description = $request->input('description');
        $book->stock = $request->input('stock');
        $book->isbn = $request->input('isbn');
        $book->save();

        // Redirect back with a success message
        return redirect()->route('admin.books')->with('success', 'Book created successfully!');
    }

     // Show the form for editing an existing book
     public function edit($id)
     {
         $book = Book::findOrFail($id);
         $authors = Book::select('author')->distinct()->get();
         $publishers = Book::select('publisher')->distinct()->get();
         return view('admin.edit-book', compact('book', 'authors', 'publishers'));
     }
 
     // Update an existing book in the database
     public function update(Request $request, $id)
     {
         // Validate the request
         $request->validate([
             'name' => 'required|string|max:255',
             'author' => 'required|string|max:255',
             'publisher' => 'required|string|max:255',
             'published_date' => 'required|date',
             'genre' => 'required|string|max:255',
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'description' => 'required|string',
             'stock' => 'required|integer|min:0',
             'isbn' => 'required|string|size:13',
         ]);
 
         // Find the book by ID
         $book = Book::findOrFail($id);
 
         // Handle file upload if a new photo is provided
         if ($request->hasFile('photo')) {
             // Delete the old photo if it exists
             if ($book->photo && file_exists(storage_path('app/public/' . $book->photo))) {
                 unlink(storage_path('app/public/' . $book->photo));
             }
 
             // Store the new photo
             $photoPath = $request->file('photo')->store('photos', 'public');
             $book->photo = $photoPath;
         }
 
         // Check for new author or publisher input
         if ($request->input('author') === 'new' && $request->input('new_author')) {
             $book->author = $request->input('new_author');
         } else {
             $book->author = $request->input('author');
         }
 
         if ($request->input('publisher') === 'new' && $request->input('new_publisher')) {
             $book->publisher = $request->input('new_publisher');
         } else {
             $book->publisher = $request->input('publisher');
         }
 
         // Update the book details
         $book->name = $request->input('name');
         $book->published_date = $request->input('published_date');
         $book->genre = $request->input('genre');
         $book->description = $request->input('description');
         $book->stock = $request->input('stock');
         $book->isbn = $request->input('isbn');
 
         // Save the updated book
         $book->save();
 
         // Redirect back to the book list with a success message
         return redirect()->route('admin.books')->with('success', 'Book updated successfully!');
     }
    
    // Delete a book record
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect()->route('admin.books')->with('success', 'Book deleted successfully!');
    }

    // Display details of a specific book
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('user.book_details', compact('book'));
    }

    // Borrow a book
    public function borrowBook($bookId)
    {
        $user = auth()->user();
        $book = Book::findOrFail($bookId);

        if (BorrowedBook::where('user_id', $user->id)->where('book_id', $bookId)->exists()) {
            return redirect()->back()->with('error', 'You have already borrowed this book.');
        }

        if ($book->stock <= 0) {
            return redirect()->back()->with('error', 'Sorry, this book is out of stock.');
        }

        BorrowedBook::create([
            'user_id' => $user->id,
            'book_id' => $bookId,
            'borrowed_at' => now(),
            'return_by' => now()->addDays(15),
        ]);

        $book->decrement('stock');

        return redirect()->route('user.my-books')->with('success', 'Book borrowed successfully!');
    }


    // Return a borrowed book
    public function returnBook($borrowedBookId)
    {
        $borrowedBook = BorrowedBook::findOrFail($borrowedBookId);
        $book = $borrowedBook->book;

        if ($borrowedBook->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You cannot return this book.');
        }

        $borrowedBook->delete();
        $book->increment('stock');

        return redirect()->route('user.my-books')->with('success', 'Book returned successfully!');
    }

    // Display the books borrowed by users
    public function myBooks()
    {
        $user = auth()->user();

        $borrowedBooks = BorrowedBook::where('user_id', $user->id)
            ->with('book')
            ->get();

        return view('user.my-books', compact('borrowedBooks'));
    }

    // Show the form for reviewing a book
    public function review($bookId)
    {
        $book = Book::findOrFail($bookId);

        return view('user.review-book', compact('book'));
    }

    // Store a book review
    public function storeReview(Request $request, $bookId)
    {
        $request->validate([
            'review' => 'required|string',
            'publisher_review' => 'required|string',
            'author_review' => 'required|string',
        ]);

        Review::create([
            'book_id' => $bookId,
            'user_id' => auth()->id(),
            'review' => $request->review,
            'publisher_review' => $request->publisher_review,
            'author_review' => $request->author_review,
        ]);

        return redirect()->route('user.my-books')->with('success', 'Review submitted successfully!');
    }

    // Display all borrowed books
    public function showBorrowedBooks()
    {
        $borrowedBooks = BorrowedBook::with(['user', 'book'])
            ->get()
            ->map(function ($borrowedBook) {
                $borrowedBook->is_overdue = Carbon::parse($borrowedBook->return_by)->isPast();
                return $borrowedBook;
            });

        return view('admin.display_borrowed_books', compact('borrowedBooks'));
    }

}
