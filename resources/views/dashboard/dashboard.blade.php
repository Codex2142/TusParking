<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('layout.header')
    <div class="container mt-6">
        <div class="d-flex">
            <!-- Aside for Parking Table -->
            <aside class="mr-3" style="flex: 1;">
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

            <!-- Additional 4 Cards in 2x2 Grid -->
            <div class="flex-wrap d-flex" style="gap: 1rem;">
                <a href="/masuk">
                    <div class="card" style="width: 250px; height: 250px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>MASUK</h4>
                        </div>
                    </div>
                </a>
                <a href="/keluar">
                    <div class="card" style="width: 250px; height: 250px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>KELUAR</h4>
                        </div>
                    </div>
                </a>
                <a href="/daftar-kendaraan">
                    <div class="card" style="width: 250px; height: 250px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>KENDARAN</h4>
                        </div>
                    </div>
                </a>
                <a href="/riwayat">
                    <div class="card" style="width: 250px; height: 250px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>RIWAYAT</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @include('layout.footer')
</body>
</html>
