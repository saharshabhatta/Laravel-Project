<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Borrowed Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
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
            background-color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .book-container {
            display: flex;
            flex-wrap: wrap;
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
        }

        .book-card img {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
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

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .badge{
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar  -->
    @include('user.user_navbar', ['pageTitle' => 'My Books'])

    <!-- Search Bar -->
    <div class="container my-4">
        <input type="text" class="form-control" placeholder="Search for a book..." id="searchInput">
    </div>

    <div class="container">
        <h2>Your Borrowed Books</h2>
        <div class="row">
            @foreach ($borrowedBooks as $borrowedBook)
                <div class="col-md-3 mb-4">
                    <div class="book-card">
                        <!-- Check if the book is overdue -->
                        @if ($borrowedBook->is_overdue)
                            <span class="badge badge-danger">Overdue</span>
                        @endif
                        <img src="{{ asset('storage/' . $borrowedBook->book->photo) }}"
                            alt="{{ $borrowedBook->book->name }}">
                        <h6 class="text-dark font-weight-bold">{{ $borrowedBook->book->name }}</h6>

                        <div class="book-buttons">
                            <form action="{{ route('book.return', $borrowedBook->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Return</button>
                            </form>

                            <!-- Add Review Button -->
                            <a href="{{ route('user.book.review', $borrowedBook->book->id) }}"
                                class="btn btn-primary btn-sm">Review</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




    <!-- Footer -->
    @include('user.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to filter books -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function (event) {
            let searchQuery = event.target.value.toLowerCase();
            let books = document.querySelectorAll('.book-card');

            books.forEach(function (book) {
                let bookName = book.querySelector('h6').textContent.toLowerCase();
                if (bookName.includes(searchQuery)) {
                    book.style.display = 'block';
                } else {
                    book.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>