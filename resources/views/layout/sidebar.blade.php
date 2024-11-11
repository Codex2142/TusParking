<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="py-3 text-white bg-dark vh-100" style="width: 250px; position: fixed;">
            <ul class="nav nav-pills flex-column">
                @if (Auth()->user()->level == 'admin')
                <li class="mb-3 nav-item">
                    <a class="p-2 text-white nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/admin-dashboard" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-person-fill me-2"></i>Petugas
                    </a>
                </li>
                @endif
                <li class="mb-3 nav-item">
                    <a class="p-2 text-white nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/masuk" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </a>
                </li>
                <li class="mb-3 nav-item">
                    <a class="p-2 text-white nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/keluar" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-box-arrow-right me-2"></i>Keluar
                    </a>
                </li>
                <li class="mb-3 nav-item">
                    <a class="p-2 text-white nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/daftar-kendaraan" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-car-front-fill me-2"></i>Kendaraan
                    </a>
                </li>
                <li class="mb-3 nav-item">
                    <a class="p-2 text-white nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/pengecualian" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-file-text"></i> Tanpa STNK
                    </a>
                </li>
                <li class="mb-3 nav-item">
                    <a class="p-2 text-white nav-link text-decoration-none rounded-3 hover-bg-secondary" href="/riwayat" onmouseover="this.classList.add('bg-secondary');"
                        onmouseout="this.classList.remove('bg-secondary');">
                        <i class="bi bi-clock-history me-2"></i>Riwayat
                    </a>
                </li>
            </ul>
        </div>
        <div class="container-fluid ms-auto" style="margin-left: 260px;">
        </div>
    </div>
</body>
