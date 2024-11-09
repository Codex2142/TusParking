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
            return response()->json(['error' => 'Data kendaraan atau petugas tidak ditemukan'], 404);
        }

        // Verifikasi lebih lanjut jika diperlukan
        // Misalnya, periksa apakah kendaraan sudah terparkir sebelumnya
        $parkirExist = Parkiran::where('plat', $kendaraan->plat)->first();
        if ($parkirExist) {
            return response()->json(['error' => 'Kendaraan sudah terparkir'], 400);
        }

        // Insert data ke tabel parkiran
        Parkiran::create([
            'plat' => $kendaraan->plat,
            'nimmasuk' => $kendaraan->nim,
            'nipmasuk' => $petugas->nip,
            'waktu_masuk' => now(), // Menambahkan waktu masuk (sekarang)
        ]);

        return response()->json(['message' => 'Kendaraan berhasil terparkir'], 200);
    }
}
