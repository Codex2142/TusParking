<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kendaraan Masuk</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container my-5">
        <div class="card" style="margin-left: 10px; padding-top: 30px;">
            <div class="card-header">
                Kendaraan Masuk
            </div>
            @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <div class="card-body">
                <form action="{{ route('verifikasi') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP Petugas</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ auth()->user()->nip }}" readonly autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="plat" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="plat" name="plat" placeholder="Masukkan Plat Nomor Kendaraan" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nomor Induk</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
    @include('layout.footer')
</body>
</html>
