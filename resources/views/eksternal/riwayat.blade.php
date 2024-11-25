<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Eksternal</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')

    <div class="container my-3">
        <div class="card" style="margin-left: 100px">
            <div class="text-white card-header bg-primary">
                Riwayat Eksternal
                <a href="/tambahkan-pengunjung" class="btn btn-light btn-sm float-end">Tambahkan</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                <input type="text" id="searchInput" class="mt-3 mb-3 form-control" placeholder="Cari Nama atau Identitas" onkeyup="searchTable()">

                @if($read->isEmpty())
                    <p class="text-center">Tidak ada Data yang tersedia.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Identitas</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                    <th>Link Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($read as $index => $i)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $i->nama }}</td>
                                        <td>{{ $i->identitas ?? 'Tidak ada' }}</td>
                                        <td>{{ $i->keperluan }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>
                                            @if($i->linkfoto)
                                                <a href="{{ asset('storage/' . $i->linkfoto) }}" target="_blank">Lihat Foto</a>
                                            @else
                                                Tidak ada
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('layout.footer')
    <script src="{{ asset('script/petugas.js') }}"></script>
</body>
</html>
