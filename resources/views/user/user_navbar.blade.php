<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #000000;
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover {
            color: #ecf0f1 !important;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .navbar-collapse {
            display: none;
        }

        .navbar-collapse.show {
            display: block;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Library Logo">
                {{ $pageTitle ?? 'Library' }}
            </a>

            <button class="navbar-toggler" type="button" onclick="toggleNavbar()">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto d-flex flex-column flex-lg-row">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.my-books') }}">My Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>

                    @auth
                    <!-- If the user is logged in, show Logout -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link bg-transparent border-0">Logout</button>
                        </form>
                    </li>
                    @else
                    <!-- If the user is not logged in, show Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleNavbar() {
            const navbarCollapse = document.getElementById('navbarNav');
            navbarCollapse.classList.toggle('show');
        }
    </script>
</body>

</html>
