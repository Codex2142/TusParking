<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;  // Pastikan Anda memiliki model Kendaraan
use App\Models\Petugas;    // Pastikan Anda memiliki model Petugas
use App\Models\Parkiran;   // Pastikan Anda memiliki model Parkiran
use Illuminate\Http\Request;

class ParkiranController extends Controller
{
    public function verifikasi(Request $request)
    {
        // Mengambil data kendaraan berdasarkan plat
        $kendaraan = Kendaraan::where('plat', $request->plat)->first();

        // Mengambil data petugas berdasarkan NIP
        $petugas = Petugas::where('nip', $request->nip)->first();

        // Memastikan data kendaraan dan petugas ditemukan
        if (!$kendaraan || !$petugas) {
            session()->flash('fail', 'Data kendaraan atau petugas tidak ditemukan');
            return redirect('/masuk');
        }

        // Verifikasi lebih lanjut jika diperlukan
        // Misalnya, periksa apakah kendaraan sudah terparkir sebelumnya
        $parkirExist = Parkiran::where('plat', $kendaraan->plat)->first();
        if ($parkirExist) {
            session()->flash('fail', 'Kendaraan sudah terparkir');
            return redirect('/masuk');
        }

        // Insert data ke tabel parkiran
        Parkiran::create([
            'plat' => $kendaraan->plat,
            'nimmasuk' => $kendaraan->nim,
            'nipmasuk' => $petugas->nip,
            'waktu_masuk' => now(), // Menambahkan waktu masuk (sekarang)
        ]);

        session()->flash('success', 'Kendaraan berhasil terparkir');
        return redirect('/masuk');
    }
}

