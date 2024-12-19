<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style.css/dashboard.css') }}">
    <style>
    .zoom-hover {
        transition: transform 0.3s ease; /* Transisi saat hover */
    }

    .zoom-hover:hover {
        transform: scale(1.1); /* Zoom sedikit saat hover */
    }
</style>

</head>
<body>
    @include('layout.header')
    <p style="margin-top:100px"></p>
    @include('layout.sidebar')

    <div class="container" style="margin-top: 100px;">
        <div class="d-flex">
            <!-- Aside for Parking Table -->
            <aside>
                <div class="card" style="margin-left: 100px">
                    <div class="text-white card-header bg-dark">
                        <h3 class="mb-0">SEDANG PARKIR</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Plat</th>
                                    <th>Petugas Masuk</th>
                                    <th>Nomor Induk Masuk</th>
                                    <th>Waktu Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($read) > 0)
                                    @foreach ($read as $i)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $i->plat }}</td>
                                            <td>{{ $i->nipmasuk }}</td>
                                            <td>{{ $i->nimmasuk }}</td>
                                            <td>{{ $i->masuk }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada Data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>

            <!-- Cards in 2x2 Grid -->
           <div class="card-grid">
    <a href="/masuk" class="text-center">
        <img src="image/MASUK.png" alt="Icon Masuk" class="shadow-sm img-fluid rounded-4 zoom-hover" style="width: 144px; height: 250px; border-radius: 15px;">
    </a>
    <a href="/keluar" class="text-center">
        <img src="image/KELUAR.png" alt="Icon Keluar" class="shadow-sm img-fluid rounded-4 zoom-hover" style="width: 144px; height: 250px; border-radius: 15px;">
    </a>
    <a href="/daftar-kendaraan" class="text-center">
        <img src="image/KENDARAAN.png" alt="Icon Kendaraan" class="shadow-sm img-fluid rounded-4 zoom-hover" style="width: 144px; height: 250px; border-radius: 15px;">
    </a>
    <a href="/riwayat" class="text-center">
        <img src="image/RIWAYAT.png" alt="Icon Riwayat" class="shadow-sm img-fluid rounded-4 zoom-hover" style="width: 144px; height: 250px; border-radius: 15px;">
    </a>
</div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @include('layout.footer')
</body>
</html>
