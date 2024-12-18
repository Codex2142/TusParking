<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kendaraan - Add</title>
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
        <div class="container-fluid" style="margin-left: 100px; padding-top: 40px;">
            <div class="card">
                <div class="card-header">Tambahkan Kendaraan Baru</div>
                @if (Session::has('fail'))
                    <span class="p-2 alert alert-danger">{{ Session::get('fail') }}</span>
                @endif
                <div class="card-body">
                    <form action="{{ route('savecreate') }}" method="post">
                        @csrf
                        <!-- PLAT -->
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Plat Nomor Kendaraan</label>
                            <input type="text" name="plat" value="{{ old('plat') }}" class="form-control" placeholder="Masukkan plat" autocomplete="off">
                            @error('plat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIM -->
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nomor Induk</label>
                            <input type="text" name="nim" value="{{ old('nim') }}" class="form-control" placeholder="Masukkan Nomor Induk" autocomplete="off">
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" placeholder="Masukkan Nama Lengkap" autocomplete="off">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- KATEGORI -->
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jabatan</label>
                            <select name="kategori" class="form-control" id="jeniskelamin">
                                <option value="" disabled selected>Jabatan</option>
                                <option value="1" {{ old('kategori') == '1' ? 'selected' : '' }}>Dosen</option>
                                <option value="2" {{ old('kategori') == '2' ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="3" {{ old('kategori') == '3' ? 'selected' : '' }}>Staff</option>
                            </select>
                            @error('kategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- MASAAKTIF -->
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Masa Aktif</label>
                            <input type="number" name="masaaktif" value="{{ old('masaaktif') }}" class="form-control yearpicker" placeholder="YYYY" min="2024" max="2100" autocomplete="off">
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
