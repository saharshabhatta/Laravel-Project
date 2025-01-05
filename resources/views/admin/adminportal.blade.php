<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card-box {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-box i {
            font-size: 40px;
            color: #ff6b6b;
        }

        .card-box .value {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }

        .card-box .title {
            font-size: 16px;
            color: #6c757d;
        }

        .welcome-section {
            margin-top: 20px;
            text-align: center;
        }

        .welcome-section h4 {
            font-size: 20px;
            font-weight: bold;
        }

        .welcome-section p {
            font-size: 16px;
            color: #555;
        }

        .highlight-name {
            color: #ff6b6b;
            font-weight: bold;
        }

        .main-content {
            padding: 20px;
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                margin-right: 0;
                text-align: center;
            }

            .card-container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('admin.navbar', ['pageTitle' => 'DASHBOARD'])

    @include('admin.sidebar')

     <!-- Welcome section with user name and current time -->
    <div class="main-content">
        <div class="container welcome-section">
            <h4>HELLO, <span class="highlight-name" id="user-name">{{ $userName }}</span></h4>
            <p id="current-time"></p>
        </div>

        <div class="container mt-5">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <!-- Card for Total Books -->
                    <div class="card-box">
                        <i class="fas fa-book"></i>
                        <div class="value">{{ $totalBooks }}</div>
                        <div class="title">Total Books</div>
                    </div>
                </div>

                   <!-- Card for Borrowed Books -->
                <div class="col-lg-3 col-md-6">
                    <div class="card-box">
                        <i class="fas fa-book"></i>
                        <div class="value">{{ $borrowedBooksCount }}</div>
                        <div class="title">Borrowed Books</div>
                    </div>
                </div>

                <!-- Card for Overdue Books -->
                <div class="col-lg-3 col-md-6">
                    <div class="card-box">
                        <i class="fas fa-hourglass-start"></i>
                        <div class="value">{{ $overdueBooksCount }}</div>
                        <div class="title">Overdue Books</div>
                    </div>
                </div>

                <!-- Card for Total Users -->
                <div class="col-lg-3 col-md-6">
                    <div class="card-box">
                        <i class="fas fa-user-plus"></i>
                        <div class="value">{{ $totalUsers }}</div>
                        <div class="title">Members</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function formatDateTime() {
            const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            const currentDateTime = new Date().toLocaleString('en-US', options);
            document.getElementById('current-time').textContent = currentDateTime;
        }

        formatDateTime();
    </script>
</body>

</html>
