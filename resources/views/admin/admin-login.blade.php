<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="p-4 card" style="width: 100%; max-width: 400px;">
            <h2 class="mb-4 text-center">Login</h2>
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required autofocus autocomplete="off">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                            <i id="eyeIcon" class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <!-- Link to Register -->
            <p class="mt-3 text-center">Silahkan mendaftar jika belum memiliki akun? <a href="/register">Daftar</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="{{ asset('script/login.js') }}"></script>
</body>
</html>
