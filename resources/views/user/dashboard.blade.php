<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333333;
        }

        .genre-section {
            margin-bottom: 30px;
        }

        .genre-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .book-container-wrapper {
            position: relative;
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .book-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 10px 0;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .book-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 150px;
            transition: transform 0.3s ease-in-out;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 8px;
            padding: 10px;
            margin-left: 20px;
        }

        .book-card img {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            border: none;
        }

        .book-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .book-buttons {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .btn {
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #333333;
            border-color: #333333;
        }

        .btn-primary:hover {
            background-color: #555555;
            border-color: #555555;
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #45a049;
            border-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- Navbar Section -->
    <div id="navbar-section">
        @include('user.user_navbar', ['pageTitle' => 'DASHBOARD'])
    </div>

    <!-- Search Bar Section -->
    <div id="search-bar-section" class="container my-4">
        <input type="text" class="form-control" placeholder="Search for a book..." id="searchInput">
    </div>

    <!-- Filter Buttons Section -->
    <div id="filter-buttons-section" class="container my-3">
        <div class="btn-group" role="group" aria-label="Filter books">
            <button id="filter-all" class="btn btn-secondary">All</button>
            <button id="filter-available" class="btn btn-success">Available</button>
            <button id="filter-outofstock" class="btn btn-danger">Out of Stock</button>
        </div>
    </div>

    <!-- Books Display Section -->
    <div id="books-display-section" class="container">
        @foreach ($books->groupBy('genre') as $genre => $booksInGenre)
            <div class="genre-section">
                <h3 class="genre-title" style="text-transform: uppercase;">{{ $genre }}</h3>
                <div class="book-container-wrapper">
                    <!-- Book Container -->
                    <div class="book-container" id="book-container-{{ $genre }}">
                        @foreach ($booksInGenre as $book)
                            <div class="book-card book-card-item" data-name="{{ strtolower($book->name) }}">
                                <img src="{{ asset('storage/' . $book->photo) }}" alt="{{ $book->name }}">
                                <h6 class="text-dark font-weight-bold">{{ $book->name }}</h6>
                                <div class="book-buttons">
                                    <a href="{{ route('user.book_details', ['id' => $book->id]) }}"
                                        class="btn btn-primary btn-sm">See More Detail</a>

                                    @if($book->stock > 0)
                                        <form action="{{ route('borrow.book', ['bookId' => $book->id]) }}" method="GET">
                                            <button type="submit" class="btn btn-success btn-sm">Borrow Now</button>
                                        </form>
                                    @else
                                        <button class="btn btn-danger btn-sm" disabled>Out of Stock</button>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Controls -->
    <div class="container my-4">
        <div class="pagination justify-content-center">
            <!-- Display Previous button if there is a previous page -->
            @if ($books->onFirstPage())
                <span class="page-link disabled">Previous</span>
            @else
                <a href="{{ $books->previousPageUrl() }}" class="page-link">Previous</a>
            @endif

            <!-- Display Next button if there is a next page -->
            @if ($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}" class="page-link">Next</a>
            @else
                <span class="page-link disabled">Next</span>
            @endif
        </div>
    </div>

    <!-- Footer Section -->
    <div id="footer-section">
        @include('user.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to filter books -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function (event) {
            filterBooks();
        });

        document.getElementById('filter-all').addEventListener('click', function () {
            filterBooks('all');
        });

        document.getElementById('filter-available').addEventListener('click', function () {
            filterBooks('available');
        });

        document.getElementById('filter-outofstock').addEventListener('click', function () {
            filterBooks('outofstock');
        });

        function filterBooks(filterType = 'all') {
            let searchQuery = document.getElementById('searchInput').value.toLowerCase();
            let books = document.querySelectorAll('.book-card-item');

            books.forEach(function (book) {
                let bookName = book.getAttribute('data-name');
                let isAvailable = book.querySelector('.btn-success') !== null; // Check if "Borrow Now" button exists

                let isVisible = true;

                if (!bookName.includes(searchQuery)) {
                    isVisible = false;
                }

                if (filterType === 'available' && !isAvailable) {
                    isVisible = false;
                } else if (filterType === 'outofstock' && isAvailable) {
                    isVisible = false;
                }

                book.style.display = isVisible ? 'flex' : 'none';
            });
        }
    </script>

</body>

</html>