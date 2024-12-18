<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kendaraan Keluar</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    @include('layout.header')

    <nav class="d-flex navbar-light bg-light cstmr" style="position: sticky;">
        <div class="container-fluid">
            <!-- Tombol "Kembali" -->
            <a href="{{ url('/') }}" class="text-white btn btn-primary bg-dark" style="text-decoration: none;">
                ← Kembali
            </a>
        </div>
    </nav>

    @include('layout.sidebar')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="shadow-lg card" style="margin-left: 10px; padding-top: 70px;">
                    <div class="text-center text-white card-header bg-primary">
                        <h3>Daftar Kendaraan yang Sedang Parkir</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('fail') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <input type="text" id="searchInput" class="mt-3 form-control me-2" placeholder="Cari Nomor Induk atau Plat" onkeyup="searchTable()">
                        <table class="table mt-3 table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Plat Nomor</th>
                                    <th>Petugas Masuk</th>
                                    <th>Nomor Induk Masuk</th>
                                    <th>Waktu Masuk</th>
                                    <th>Aksi</th>
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
                                            <td>
                                                <a href="/keluar-validasi/{{ $i->id }}" class="btn btn-primary btn-sm">Keluar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada Data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    <script src="{{ asset('script/keluar.js') }}"></script>
</body>
</html>
