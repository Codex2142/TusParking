<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validasi Keluar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container mt-5">
        <h1 class="mb-4">Form Keluar</h1>
        <form action="{{ route('create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="plat">Plat Kendaraan:</label>
                <input type="text" class="form-control" name="plat" id="plat" value="{{ $edit->plat }}" required readonly>
            </div>
            <div class="form-group">
                <label for="nipkeluar">NIP Keluar:</label>
                <input type="text" class="form-control" name="nipkeluar" id="nipkeluar" value="{{ auth()->user()->nip }}" readonly>
            </div>
            <div class="form-group">
                <label for="nimkeluar">NIM Keluar:</label>
                <input type="text" class="form-control" name="nimkeluar" id="nimkeluar" value="{{ old('nimkeluar') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if ($errors->any())
            <div class="mt-4 alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @include('layout.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
