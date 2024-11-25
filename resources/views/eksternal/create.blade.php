<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Eksternal</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')

    <div class="container my-3">
        <div class="card" style="margin-left: 100px">
            <div class="text-white card-header bg-primary">
                Tambah Eksternal
            </div>
            <div class="card-body">
                @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                <form action="{{ route('createfoto') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="identitas" class="form-label">Identitas</label>
                        <input type="text" class="form-control" id="identitas" name="identitas" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="linkfoto" class="form-label">Link Foto</label>
                        <input type="file" class="form-control" id="linkfoto" name="linkfoto" accept="image/*" required>
                    </div>

                    <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->toDateString() }}">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    @include('layout.footer')
    <script src="{{ asset('script/petugas.js') }}"></script>
</body>
</html>
