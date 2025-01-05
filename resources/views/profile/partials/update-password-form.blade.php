<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
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

        .btn-save {
            border-radius: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .notification {
            font-size: 14px;
            color: #28a745;
        }

        .text-danger {
            font-size: 14px;
            color: #e74a3b;
        }
    </style>
</head>

<body>

    <!-- Update Password Form -->
    <div class="container form-section">
        <header class="form-header">
            <h2>Update Password</h2>
            <p>Ensure your account is using a long, random password to stay secure.</p>
        </header>

        <!-- Update Password Form -->
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" autocomplete="current-password" required>
                @error('current_password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" required>
                @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                @error('password_confirmation')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="form-group">
                <button type="submit" class="btn-save">Save</button>

                @if (session('status') === 'password-updated')
                    <p class="mt-3 notification">Saved successfully.</p>
                @endif
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
