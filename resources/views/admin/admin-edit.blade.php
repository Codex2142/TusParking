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
    <div class="container">
        <div class="card">
            <div class="card-header">Tambahkan user Baru</div>
            @if (Session::has('fail'))
                <span class="p-2 alert alert-danger">{{ Session::get('fail') }}</span>

            @endif
            <div class="card-body">
                <form action="{{ route('saveedit') }}" method="post">
                    @csrf
                    {{-- NIP --}}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">NIP</label>
                        <input type="text" name="nip" value="{{$edit->nip}}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan NIP">
                        @error('nip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- NAMA --}}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{$edit->nama}}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama lengkap">
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
                        <label for="formGroupExampleInput" class="form-label">username</label>
                        <input type="text" name="username" value="{{$edit->username}}" class="form-control" id="formGroupExampleInput" placeholder="Masukkan username">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password baru">
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
