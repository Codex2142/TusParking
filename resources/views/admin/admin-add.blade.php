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
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container">
        <div class="card">
            <div class="card-header">Tambahkan user Baru</div>
            @if (Session::has('fail'))
                <span class="p-2 alert alert-danger">{{ Session::get('fail') }}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('savecreate1') }}" method="post">
                    @csrf
                    {{-- NIP --}}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">NIP</label>
                        <input type="text" name="nip" value="{{ old('nip') }}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan NIP">
                        @error('nip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Peran --}}
                    <div class="mb-3">
                        <label for="level" class="form-label">Peran</label>
                        <select name="level" class="form-control" id="level">
                            <option value="" disabled selected>Peran</option>
                            <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>petugas</option>
                        </select>
                        @error('level')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- NAMA --}}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama lengkap">
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
                        <label for="formGroupExampleInput" class="form-label">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan username">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @include('layout.footer')
</body>
</html>
