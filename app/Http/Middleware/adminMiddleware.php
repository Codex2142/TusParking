<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();

            // Periksa apakah pengguna adalah admin
            if ($user->level === 'admin') {
                // Admin memiliki akses ke semua rute
                return $next($request);
            }

            // Periksa apakah pengguna adalah petugas dan sedang mengakses rute yang diperbolehkan
            if ($user->level === 'petugas') {
                $allowedRoutes = [
                    'daftar-kendaraan',
                    'tambah-kendaraan',
                    'edit-kendaraan',
                    'keluar',
                    'masuk'
                ];

                // Cek apakah rute saat ini termasuk dalam daftar yang diizinkan
                foreach ($allowedRoutes as $route) {
                    if ($request->is($route) || $request->is("$route/*")) {
                        return $next($request);
                    }
                }

                // Jika tidak termasuk dalam daftar, tolak akses
                return abort(403, 'Access denied');
            }
        }

        // Jika pengguna belum login, arahkan ke halaman login
        return redirect('/login');
    }
}
