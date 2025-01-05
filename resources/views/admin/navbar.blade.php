<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #e74c3c;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 80px;
        }

        .navbar-items {
            display: flex;
            align-items: center;
            color: white !important;
            font-weight: bold;
            margin-left: 30px;
            font-size: 24px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background-image: url('{{ asset('images/logo.png') }}');
            background-size: cover;
            background-position: center;
            margin-right: 10px;
        }

        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        body {
            padding-top: 70px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-items">
            <div class="logo"></div>
            {{ $pageTitle ?? 'Library' }}
        </div>
    </nav>

</body>

</html>