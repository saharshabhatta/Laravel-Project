<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f1e1; 
        }
        .reset-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        .reset-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: absolute;
            z-index: 2;
            max-width: 400px; 
            width: 100%; 
        }

        .reset-heading {
            margin-bottom: 20px;
            color: #e74c3c; 
        }
        .library-images {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0;
        }
        .library-images div {
            width: 50%;
            height: 100%;
            overflow: hidden;
        }
        .library-images img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }
        .library-logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 20px;
        }
        .library-logo-container img {
            width: 80px;
            height: auto;
            margin-right: 15px;
        }
        .btn-reset {
            background-color: #e74c3c; 
            color: white;
        }
        .btn-reset:hover {
            background-color: #c0392b;
        }
        .back-to-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .back-to-login a {
            color: #e74c3c;
            text-decoration: none;
        }
        .back-to-login a:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>

<div class="reset-container">
    
    <div class="library-images">
        <div>
            <img src="{{ asset('images/library1.jpg') }}" alt="Library 1">
        </div>
        <div>
            <img src="{{ asset('images/library2.jpg') }}" alt="Library 2">
        </div>
    </div>

    <div class="reset-form">
        <div class="text-center">
            <div class="library-logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Library Logo"> 
                <h2 class="reset-heading">
                    Password Reset
                </h2>
            </div>
        </div>

        <div class="mb-4 text-sm text-secondary">
            Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Password Reset Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-reset w-100">Email Password Reset Link</button>
        </form>

        <!-- Back to Login -->
        <div class="back-to-login mt-3">
            <a href="{{ route('login') }}">Back to login</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
