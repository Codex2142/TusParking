<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container my-4">
        <div class="card">
            <div class="text-white card-header bg-primary">
                Anggota Satpam TUSParking
                <a href="/admin-add" class="btn btn-light btn-sm float-end">+</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <input type="text" id="searchInput" class="mt-3 mb-3 form-control me-2" placeholder="Cari NIP atau Nama Lengkap" onkeyup="searchTable()">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($read) > 0)
                            @foreach ($read as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->nip }}</td>
                                    <td>{{ $i->nama }}</td>
                                    <td>{{ $i->jeniskelamin }}</td>
                                    <td>{{ $i->username }}</td>
                                    <td>{{ $i->password }}</td>
                                    <td><a href="/admin-edit/{{ $i->nip }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="/admin-delete/{{ $i->nip }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Hapus</a></td>
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
    <script src="{{ asset('script/petugas.js') }}"></script>
</body>
</html>
