<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List kendaraan</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container my-5">
        <div class="card" style="margin-left: 100px; padding-top: 40px;">
            <div class="text-white card-header bg-primary">
                Kendaraan Yang Terdaftar
                <a href="/tambah-kendaraan" class="btn btn-light btn-sm float-end">+</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                {{-- form search --}}
                <div class="mb-3 d-flex">
                    <input type="text" id="searchInput" class="form-control me-2" placeholder="Cari Nomor Induk atau Plat" onkeyup="searchTable()" autocomplete="off">
                </div>

                <table class="table table-bordered table-striped" id="kendaraanTable">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Plat</th>
                            <th>Nomor Induk</th>
                            <th>Nama Lengkap</th>
                            <th>Kategori</th>
                            <th>Masa Aktif</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($read) > 0)
                            @foreach ($read as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->plat }}</td>
                                    <td>{{ $i->nim }}</td>
                                    <td>{{ $i->nama }}</td>
                                    <td>{{ $i->kategori }}</td>
                                    <td>{{ $i->masaaktif }}</td>
                                    <td><a href="/edit-kendaraan/{{ $i->plat }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="/daftar-kendaraan/{{ $i->plat }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada Data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layout.footer')
    <script src="{{ asset('script/daftar-kendaraan.js') }}"></script>
</body>
</html>
