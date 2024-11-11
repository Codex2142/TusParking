<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@auth
<body style="width: 100%; overflow: hidden;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px" >
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="image/Logo.png" class="img-fluid" alt="Logo" style="max-width: 150px; margin-left: 20px;">
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
                        <span id="username" class="text-white fw-semibold">{{ auth()->user()->username }}</span>
                    </li>


                    <!-- Dashboard Button -->
                    @if (auth()->check() && auth()->user()->level == 'admin')
                        <a href="/admin-dashboard">
                            <li class="nav-item me-2">
                                <button type="button" class="btn btn-outline-light">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
                                </button>
                            </li>
                        </a>
                    @else
                        <a href="/">
                            <li class="nav-item me-2">
                                <button type="button" class="btn btn-outline-light">
                                    <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
                                </button>
                            </li>
                        </a>
                    @endif

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <!-- Custom JavaScript for Date -->
    <script src="script.js"></script>

</body>
@endauth
</html>
