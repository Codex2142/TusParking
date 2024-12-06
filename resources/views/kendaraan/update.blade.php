<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kendaraan - Edit</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/yearpicker/1.1.0/yearpicker.css" />
</head>
<body>

        @include('layout.header')

        <nav class="d-flex navbar-light bg-light cstmr" style="position: sticky;">
            <div class="container-fluid">
                <!-- Tombol "Kembali" -->
                <a href="{{ url('/daftar-kendaraan') }}" class="text-white btn btn-primary bg-dark" style="text-decoration: none;">
                    ← Kembali
                </a>
            </div>
        </nav>

        @include('layout.sidebar')

        <!-- Main Content -->
        <div class="container-fluid" style="margin-left: 100px; padding-top: 70px;">
            <div class="card">
                <div class="card-header">Edit Kendaraan</div>
                @if (Session::has('fail'))
                    <span class="p-2 alert alert-danger">{{ Session::get('fail') }}</span>
                @endif
                <div class="card-body">
                    <form action="{{ route('saveedit') }}" method="post">
                        @csrf
                        <!-- PLAT -->
                        <div class="mb-3">
                            <label for="plat" class="form-label">Plat Nomor Kendaraan</label>
                            <input type="text" name="plat" value="{{ $edit->plat }}" class="form-control" id="plat" placeholder="Masukkan plat" autocomplete="off">
                            @error('plat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIM -->
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nomor Induk</label>
                            <input type="text" name="nim" value="{{ $edit->nim }}" class="form-control" id="nim" placeholder="Masukkan Nomor Induk" autocomplete="off">
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ $edit->nama }}" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" autocomplete="off">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- KATEGORI -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Jabatan</label>
                            <select name="kategori" class="form-control" id="kategori">
                                <option value="" disabled>Jabatan</option>
                                <option value="1" {{ $edit->kategori == '1' ? 'selected' : '' }}>Dosen</option>
                                <option value="2" {{ $edit->kategori == '2' ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="3" {{ $edit->kategori == '3' ? 'selected' : '' }}>Staff</option>
                            </select>
                            @error('kategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- MASAAKTIF -->
                        <div class="mb-3">
                            <label for="masaaktif" class="form-label">Masa Aktif</label>
                            <input type="number" name="masaaktif" value="{{ $edit->masaaktif }}" class="form-control yearpicker" id="masaaktif" placeholder="YYYY" min="2024" max="2100" autocomplete="off">
                            @error('masaaktif')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <script src="{{ asset('script/kendaraan-create.js') }}"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/yearpicker/1.1.0/yearpicker.js"></script>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
