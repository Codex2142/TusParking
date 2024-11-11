<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Eksternal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('layout.header')
    @include('layout.sidebar')
<div class="container my-5">

    @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    <h2 class="mb-4 text-center">Tambah Eksternal</h2>

    <form action="{{ route('createfoto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="identitas" class="form-label">Identitas</label>
            <input type="text" class="form-control" id="identitas" name="identitas">
        </div>

        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" required>
        </div>

        <div class="mb-3">
            <label for="linkfoto" class="form-label">Link Foto</label>
            <input type="file" class="form-control" id="linkfoto" name="linkfoto" accept="image/*" required>
        </div>

        <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->toDateString() }}">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layout.footer')
</body>
</html>
