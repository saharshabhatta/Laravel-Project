<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->name }} - Book Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('user.user_navbar', ['pageTitle' => 'Books Detail'])

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $book->photo) }}" class="img-fluid" alt="{{ $book->name }}">
            </div>
            <div class="col-md-8">
                <!-- Book details (Name, Author, Genre, etc.) -->
                <h2>{{ $book->name }}</h2>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>Genre:</strong> {{ $book->genre }}</p>
                <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
                <p><strong>Published Date:</strong> {{ $book->published_date }}</p>
                <p><strong>Description:</strong> {{ $book->description }}</p>

                <!-- Button to borrow the book if it's in stock -->
                @if($book->stock > 0)
                    <form action="{{ route('borrow.book', ['bookId' => $book->id]) }}" method="GET">
                        <button type="submit" class="btn btn-success btn-sm">Borrow Now</button>
                    </form>
                @else
                    <button class="btn btn-danger btn-sm" disabled>Out of Stock</button>
                @endif
            </div>
        </div>
    </div>

    @include('user.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>