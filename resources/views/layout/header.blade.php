<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header TusParking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>

        /* Navbar fixed at the top */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            background-color: #343a40;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; padding: 10px;">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="image/Logo.png" class="img-fluid" alt="Logo" style="max-width: 150px;">
            </a>

            <!-- Toggle button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar content (right side) -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <!-- Current Date -->
                    <li class="nav-item me-3">
                        <span id="current-date" class="text-white"></span>
                    </li>

                    <!-- User Icon and Name -->
                    <li class="nav-item me-3 d-flex align-items-center">
                        <span id="username" class="text-white fw-semibold">{{ strtoupper(Auth::user()->username) }} | {{ strtoupper(Auth::user()->level) }}</span>
                    </li>

                    <!-- Dashboard Button -->
                    <li class="nav-item me-2">
                        <a href="/" class="btn btn-outline-light w-100 text-decoration-none">
                        <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
                        </a>
                    </li>


                    <!-- Logout Button -->
                    <li class="nav-item">
                        <a href="/logout">
                            <button type="button" class="btn btn-danger">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>


