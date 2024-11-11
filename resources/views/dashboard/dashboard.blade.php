<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style.css/dashboard.css') }}">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')

    <div class="container mt-6" style="margin-top: 100px;">
        <div class="d-flex">
            <!-- Aside for Parking Table -->
            <aside>
                <div class="card">
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
                <a href="/masuk" class="card-custom masuk">
                    <h4>MASUK</h4>
                </a>
                <a href="/keluar" class="card-custom keluar">
                    <h4>KELUAR</h4>
                </a>
                <a href="/daftar-kendaraan" class="card-custom kendaraan">
                    <h4>KENDARAAN</h4>
                </a>
                <a href="/riwayat" class="card-custom riwayat">
                    <h4>RIWAYAT</h4>
                </a>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
