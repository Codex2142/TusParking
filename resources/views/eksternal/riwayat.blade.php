<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Eksternal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('layout.header')
    @include('layout.sidebar')
<div class="container my-5">

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    <h2 class="mb-4 text-center">Riwayat Eksternal</h2>
    <div class="card-header">
        <button class="mb-2 btn btn-primary">
            <a href="/tambahkan-pengunjung" class="text-white text-decoration-none">Tambahkan</a>
        </button>
    </div>
    @if($read->isEmpty())
        <p class="text-center">Tidak ada Data yang tersedia.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layout.footer')
</body>
</html>
