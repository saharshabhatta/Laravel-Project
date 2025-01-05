<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #2c3e50;
            color: white;
            z-index: 1;
            padding-top: 100px;
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar a,
        .sidebar .logout-button {
            color: white;
            padding: 15px 25px;
            text-decoration: none;
            display: block;
            border: none;
            text-align: left;
            background: none;
            cursor: pointer;
            width: 100%;
        }

        .sidebar a:hover,
        .sidebar .logout-button:hover {
            background-color: #ff6b6b;
        }

        .hamburger {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            background-color: #2c3e50;
            color: white;
            border: none;
            font-size: 24px;
            cursor: pointer;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                margin-top: 50px;
            }

            .sidebar.show {
                transform: translateX(0);
                margin-top: 50px;
            }

            .hamburger {
                display: block;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <button class="hamburger" onclick="toggleSidebar()">☰</button>

    <div class="sidebar" id="sidebar">
        <a href="{{ route('admin.adminportal') }}">Home</a>
        <a href="{{ route('admin.books') }}" target="_self">Books</a>
        <a href="{{ route('admin.display_borrowed_books') }}" target="_self">Borrowed Books</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>

</html>