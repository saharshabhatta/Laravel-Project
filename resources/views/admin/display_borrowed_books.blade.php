<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .content {
            margin: 20px auto;
            margin-right: 50px;
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            margin-left: auto;
            margin-right: 500px;
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

        .btn-overdue {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-not-overdue {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .no-books {
            text-align: center;
            color: #777;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    @include('admin.navbar', ['pageTitle' => 'Borrowed Books'])
    @include('admin.sidebar')

    <div class="content">
        <div class="container mt-5">
            <h1>Borrowed Books</h1>
              <!-- Search input field -->
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search borrowed books...">
            </div>
            <!-- Table displaying borrowed books details -->
            <table class="table table-bordered mt-3" id="booksTable">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Book Name</th>
                        <th>Borrowed Date</th>
                        <th>Suppositive Return Date</th>
                        <th>Overdue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowedBooks as $borrowedBook)
                        <tr>
                            <td>{{ $borrowedBook->user->name }}</td>
                            <td>{{ $borrowedBook->book->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($borrowedBook->borrowed_at)->format('Y-m-d') }}</td>
                            <td>{{ $borrowedBook->return_by ? \Carbon\Carbon::parse($borrowedBook->return_by)->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                @if ($borrowedBook->is_overdue)
                                    Overdue
                                @else
                                    Not Overdue
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(count($borrowedBooks) == 0)
                <p class="no-books">No borrowed books available.</p>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
    <!-- Script for live search functionality -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#booksTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });
    </script>
</body>

</html>
