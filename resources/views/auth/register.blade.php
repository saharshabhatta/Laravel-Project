<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f1e1; 
        }
        .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        position: relative;
    }
    .register-form {
        background-color: #fff;
        padding: 35px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: absolute;
        z-index: 2;
        max-height: 100%; 
        height: 1000px; 
        width: 100%;
        max-width: 450px; 
        overflow-y: auto; 
    }

        .register-heading {
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
            height: 600px;
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
        .btn-register {
            background-color: #e74c3c; 
            color: white;
        }
        .btn-register:hover {
            background-color: #c0392b;
        }
        .login-link {
            display: flex;
            justify-content: center;
        }
        .login-link a {
            color: #e74c3c;
            text-decoration: none;
        }
        .login-link a:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>

<div class="register-container">
    
    <div class="library-images">
        <div>
            <img src="{{ asset('images/library1.jpg') }}" alt="Library 1">
        </div>
        <div>
            <img src="{{ asset('images/library2.jpg') }}" alt="Library 2">
        </div>
    </div>

    <div class="register-form">
        <div class="text-center">
            <div class="library-logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Library Logo"> 
                <h2 class="register-heading">
                    LIBRARY <br> Management System
                </h2>
            </div>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-1">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Role -->
            <div class="mb-1">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <!-- Submit Button -->
            <button type="submit" class="btn btn-register w-100">Register</button>
        </form>

        <!-- Link to Login -->
        <div class="login-link mt-1">
            <a href="{{ route('login') }}">Already have an account? Log in here</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
