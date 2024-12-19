<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Add</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
        <nav class="d-flex navbar-light bg-light cstmr" style="position: sticky;">
            <div class="container-fluid">
                <!-- Tombol "Kembali" -->
                <a href="{{ url('/login') }}" class="text-white btn btn-primary bg-dark" style="text-decoration: none;">
                    ← Kembali
                </a>
            </div>
        </nav>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">Registrasi Petugas</div>
            @if (Session::has('fail'))
                <span class="p-2 alert alert-danger">{{ Session::get('fail') }}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('createregis') }}" method="POST">
                @csrf

                {{-- NIP --}}
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip') }}" class="form-control" id="nip" placeholder="Masukkan NIP" autocomplete="off">
                    @error('nip')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" id="nama" placeholder="Masukkan Nama lengkap" autocomplete="off">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control" id="jeniskelamin">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="l" {{ old('jeniskelamin') == 'l' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="p" {{ old('jeniskelamin') == 'p' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jeniskelamin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Masukkan username" autocomplete="off">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Masukkan password" autocomplete="off">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
