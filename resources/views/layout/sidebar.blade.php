<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamburger Sidebar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .offcanvas-backdrop.show {
      opacity: 0.5;
    }

    .cstmr {
  margin-top: 100px; /* Atur sesuai kebutuhan */
}

  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="d-flex navbar-light bg-light cstmr" style="position: sticky;">
    <div class="container-fluid">
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
        ☰ Menu
      </button>
    </div>
  </nav>

  <!-- Offcanvas Sidebar -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group">

                    @if (Auth::check() && Auth::user()->level === 'admin')
                        <li class="mb-3 nav-link">
                            <a class="p-2 nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/admin-dashboard" onmouseover="this.classList.add('bg-secondary');"
                                onmouseout="this.classList.remove('bg-secondary');">
                                <i class="bi bi-person-fill me-2"></i>Petugas
                            </a>
                        </li>
                    @endif
                    <li class="mb-3 nav-link">
                    <a class="p-2 nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/daftar-kendaraan" onmouseover="this.classList.add('bg-secondary');"
                            onmouseout="this.classList.remove('bg-secondary');">
                            <i class="bi bi-car-front-fill me-2"></i>Kendaraan
                        </a>
                    </li>
                    <li class="mb-3 nav-link">
                    <a class="p-2 nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/masuk" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </a>
                </li>
                <li class="mb-3 nav-link">
                    <a class="p-2 nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/keluar" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-box-arrow-right me-2"></i>Keluar
                    </a>
                </li>
                <li class="mb-3 nav-link">
                    <a class="p-2 nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/pengecualian" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-file-text me-2"></i> Tanpa STNK
                    </a>
                </li>
                <li class="mb-3 nav-link">
                    <a class="p-2 nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/riwayat" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-clock-history me-2"></i>Riwayat
                    </a>
                </li>
      </ul>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
