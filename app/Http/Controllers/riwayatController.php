<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkiran;
use App\Models\Riwayat;
use Carbon\Carbon;

class RiwayatController extends Controller
{
    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'plat' => 'required|string',
            'nipkeluar' => 'required|string',
            'nimkeluar' => 'required|string',
        ]);

        // Mengambil data dari tabel parkiran berdasarkan plat
        $parkiran = Parkiran::where('plat', $request->plat)->first();

        if ($parkiran) {
            try {
                // Membuat entri baru di tabel riwayat dengan data dari parkiran
                Riwayat::create([
                    'plat' => $parkiran->plat,
                    'nipmasuk' => $parkiran->nipmasuk,
                    'nimmasuk' => $parkiran->nimmasuk,
                    'masuk' => $parkiran->masuk,
                    'nipkeluar' => $request->nipkeluar,
                    'nimkeluar' => $request->nimkeluar,
                    'keluar' => Carbon::now(), // mengambil waktu saat ini
                ]);

                // Menghapus data dari tabel parkiran berdasarkan plat
                Parkiran::where('plat', $parkiran->plat)->delete();

                return redirect('/keluar')->with('success', 'Berhasil melakukan perubahan');
            } catch (\Exception $e) {
                return redirect('/keluar')->with('fail', $e->getMessage());
            }
        } else {
            return redirect('/keluar')->with('fail', 'Data parkiran tidak ditemukan');
        }
    }
}
