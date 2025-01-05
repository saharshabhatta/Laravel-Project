<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .addBooks-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 150px;
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .save-button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .save-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .addBooks-form {
                padding: 20px;
                margin: 0 auto;
                width: 90%;
                max-width: 500px;
            }

            .form-title {
                font-size: 24px;
            }

            .save-button {
                font-size: 14px;
            }

            input[type="text"],
            input[type="date"],
            select,
            textarea {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    @include('admin.navbar', ['pageTitle' => 'Add Book'])
    @include('admin.sidebar')

    <div class="addBooks-container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="addBooks-form">
                    <div class="form-title">Create a New Book</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Book creation form -->
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" required>

                        <label for="name">Book Name:</label>
                        <input type="text" id="name" name="name" required>
                        <br>

                        <label for="author">Author:</label>
                        <select id="author" name="author" onchange="toggleNewAuthor()" required>
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->author }}">{{ $author->author }}</option>
                            @endforeach
                            <option value="new">Add New Author</option>
                        </select>
                        <input type="text" id="new_author" name="new_author" placeholder="Enter new author name"
                            style="display: none; margin-top: 10px;">

                        <label for="publisher">Publisher:</label>
                        <select id="publisher" name="publisher" onchange="toggleNewPublisher()" required>
                            <option value="">Select Publisher</option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->publisher }}">{{ $publisher->publisher }}</option>
                            @endforeach
                            <option value="new">Add New Publisher</option>
                        </select>
                        <input type="text" id="new_publisher" name="new_publisher"
                            placeholder="Enter new publisher name" style="display: none; margin-top: 10px;">


                        <label for="genre">Genre:</label>
                        <select id="genre" name="genre" required>
                            <option value="">Select Genre</option>
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-fiction</option>
                            <option value="mystery">Mystery</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="biography">Biography</option>
                            <option value="science">Science</option>
                        </select>
                        <br>

                        <label for="published_date">Published Date:</label>
                        <input type="date" id="published_date" name="published_date" required>
                        <br>

                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                        <br>

                        <label for="stock">Stock:</label>
                        <input type="number" id="stock" name="stock" min="0" value="0" required>
                        <br>

                        <label for="photo">Upload Photo:</label>
                        <input type="file" id="photo" name="photo" accept="image/*" required>
                        <br>

                        <button type="submit" class="save-button">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- JavaScript for handling the input visibility -->
    <script>
        function toggleNewAuthor() {
            const authorSelect = document.getElementById("author");
            const newAuthorInput = document.getElementById("new_author");
            newAuthorInput.style.display = authorSelect.value === "new" ? "block" : "none";
        }

        function toggleNewPublisher() {
            const publisherSelect = document.getElementById("publisher");
            const newPublisherInput = document.getElementById("new_publisher");
            newPublisherInput.style.display = publisherSelect.value === "new" ? "block" : "none";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>