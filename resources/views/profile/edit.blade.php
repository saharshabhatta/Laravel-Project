<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Inline styles for layout and design -->
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

    <!-- Include the user-navbar -->
    @include('user.user_navbar', ['pageTitle' => 'Profile'])

    <div class="container py-12">
        <!-- Profile Header -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <header class="form-header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </header>

            <!-- Update Profile Information Form -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Form -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Form -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Include the footer -->
    @include('user.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
