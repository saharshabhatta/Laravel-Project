<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Inline styles for form and page layout -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .form-section {
            margin-top: 30px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            margin-bottom: 20px;
        }

        .form-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .form-header p {
            font-size: 14px;
            color: #6c757d;
        }

        .form-group input {
            border-radius: 5px;
            border-color: #ced4da;
            padding: 10px;
            font-size: 16px;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
        }

        .btn-danger {
            border-radius: 20px;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            border-radius: 20px;
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .modal-header, .modal-body, .modal-footer {
            padding: 20px;
        }

        .modal-header h5 {
            font-size: 18px;
            font-weight: 600;
        }

        .modal-body p {
            font-size: 14px;
            color: #6c757d;
        }

        .notification {
            font-size: 14px;
            color: #28a745;
        }
    </style>
</head>

<body>

    <!-- Delete Account Section -->
    <div class="container form-section">
        <header class="form-header">
            <h2>Delete Account</h2>
            <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
        </header>

        <!-- Delete Account Button -->
        <button class="btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Account</button>

        <!-- Delete Account Confirmation Modal -->
        <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete your account?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

                        <!-- Password Input Field -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" />
                            <small class="text-danger mt-2" id="passwordError"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-danger">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
