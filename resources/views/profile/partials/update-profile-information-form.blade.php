<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
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
    </style>
</head>

<body>

    <!-- Profile Information Form -->
    <div class="container form-section">
        <header class="form-header">
            <h2>Profile Information</h2>
            <p>Update your account's profile information and email address.</p>
        </header>

        <!-- Verification Form -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Profile Update Form -->
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus />
                @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required />
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3">
                        <p>Your email address is unverified. 
                            <button form="send-verification" class="btn btn-link text-primary">
                                Click here to re-send the verification email.
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="notification">A new verification link has been sent to your email address.</p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Save Button -->
            <div class="form-group">
                <button type="submit" class="btn-save">Save</button>

                @if (session('status') === 'profile-updated')
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
