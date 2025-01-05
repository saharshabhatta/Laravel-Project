<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f1e1; 
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: absolute;
            z-index: 2;
        }
        .login-heading {
            margin-bottom: 30px;
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
            margin-bottom: 30px;
        }
        .library-logo-container img {
            width: 80px;
            height: auto;
            margin-right: 15px;
        }
        .btn-login {
            background-color: #e74c3c; 
            color: white;
        }
        .btn-login:hover {
            background-color: #c0392b;
        }
        .register-link {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .register-link a {
            color: #e74c3c;
            text-decoration: none;
        }
        .register-link a:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>

<div class="login-container">
    
    <div class="library-images">
        <div>
            <img src="{{ asset('images/library1.jpg') }}" alt="Library 1">
        </div>
        <div>
            <img src="{{ asset('images/library2.jpg') }}" alt="Library 2">
        </div>
    </div>

    <div class="login-form">
        <div class="text-center mb-4">
            <div class="library-logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Library Logo"> 
                <h2 class="login-heading">
                    LIBRARY <br> Management System
                </h2>
            </div>
        </div>

        <!-- Login Form with Blade Validation -->
        <form method="POST" action="{{ route('login') }}">
        @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            
            <button type="submit" class="btn btn-login w-100 mt-3">Log In</button>

          
            @if (Route::has('password.request'))
                <div class="text-center mt-2">
                    <a href="{{ route('password.request') }}" class="text-decoration-none text-secondary">Forgot your password?</a>
                </div>
            @endif
        </form>

        <div class="register-link mt-3">
            <a href="{{ route('register') }}">Don't have an account? Register here</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
