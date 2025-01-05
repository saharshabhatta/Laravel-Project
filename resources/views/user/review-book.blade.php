<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    @include('user.user_navbar', ['pageTitle' => 'Review'])

    <div class="container my-4">
        <h2>Review the Book: {{ $book->name }}</h2>

        <form action="{{ route('book.storeReview', $book->id) }}" method="POST">
            @csrf

             <!-- Review input field for the user -->
            <div class="form-group">
                <label for="review">Your Review</label>
                <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
            </div>

            <!-- Review input field for the publisher's review -->
            <div class="form-group">
                <label for="publisher_review">Publisher Review</label>
                <textarea class="form-control" id="publisher_review" name="publisher_review" rows="3" required></textarea>
            </div>

              <!-- Review input field for the author's review -->
            <div class="form-group">
                <label for="author_review">Author Review</label>
                <textarea class="form-control" id="author_review" name="author_review" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit Review</button>
        </form>
    </div>

    <!-- Footer -->
    @include('user.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
