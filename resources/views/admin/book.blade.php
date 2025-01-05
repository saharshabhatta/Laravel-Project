<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .display-books {
            margin: 20px auto;
            margin-right: 70px;
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;

        }

        .btn-add:hover {
            background-color: #218838;
        }

        .btn-primary,
            .btn-danger {
                width: 100%;
                margin-bottom: 5px;
                font-size: 14px;
            }

        .no-books {
            text-align: center;
            color: #777;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .display-books {
                padding: 15px;
            }

            .btn-add {
                width: 50%;
                margin-bottom: 10px;
            }

            .btn-primary,
            .btn-danger {
                width: 100%;
                margin-bottom: 5px;
                font-size: 14px;
            }

            table th,
            table td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('admin.navbar', ['pageTitle' => 'Books'])

    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Main Content -->
    <div class="container display-books">
        <div class="add buttons">
            <div class="col-12">
                <h1>Books</h1>
                <!-- Button to add a new book -->
                <button class="btn-add" onclick="location.href='{{ route('books.create') }}'">Add Book</button>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="col-12">
                <input type="text" id="searchInput" class="form-control my-3" placeholder="Search for books...">
            </div>
        </div>

        <!-- Books Table -->
        <div class="book-table">
            <div class="col-12">
                <table id="booksTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Genre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($books) && count($books) > 0)
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book['name'] }}</td>
                                    <td>{{ $book['author'] }}</td>
                                    <td>{{ $book['publisher'] }}</td>
                                    <td>{{ $book['genre'] }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            onclick="location.href='{{ route('books.edit', $book['id']) }}'">Edit</button>
                                        <form action="{{ route('books.destroy', $book['id']) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No books available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#booksTable tbody tr');

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
