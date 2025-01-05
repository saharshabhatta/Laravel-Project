<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPortalController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserDashboardController;

// Root route: No login required
Route::get('/', function () {
    // Just render the dashboard for both logged in and not logged-in users
    return redirect('/dashboard');
});

// Dashboard route - accessible to everyone
Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');

// Admin portal route (still requires authentication and admin check)
Route::get('/adminportal', [AdminPortalController::class, 'showDashboard'])
    ->name('admin.adminportal')
    ->middleware(['auth', 'verified', 'admin']);

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Book Routes (requires authentication for admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('admin.books');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/borrowed-books', [BookController::class, 'showBorrowedBooks'])->name('admin.display_borrowed_books');
});

// Borrowing and reviewing books (requires authentication for users)
Route::middleware('auth')->group(function () {
    Route::get('borrow/{bookId}', [BookController::class, 'borrowBook'])->name('borrow.book');
    Route::get('/my-books', [BookController::class, 'myBooks'])->name('user.my-books');
    Route::get('/book/{bookId}/review', [BookController::class, 'review'])->name('user.book.review');
    Route::post('/book/{bookId}/review', [BookController::class, 'storeReview'])->name('book.storeReview');
    Route::delete('/return-book/{borrowedBook}', [BookController::class, 'returnBook'])->name('book.return');
});

// Profile Routes (requires authentication for users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Book details route
Route::get('/user/book-details/{id}', [BookController::class, 'show'])->name('user.book_details');

require __DIR__ . '/auth.php';
