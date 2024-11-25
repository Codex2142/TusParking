<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkiran;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function read(){
        $read = riwayat::all();
        return view('riwayat.riwayat', compact('read'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'plat' => 'required|string',
            'nipkeluar' => 'required|string',
            'nimkeluar' => 'required|string',
        ]);

        $parkiran = Parkiran::where('plat', $request->plat)->first();

        if ($parkiran) {
            try {
                Riwayat::create([
                    'plat' => $parkiran->plat,
                    'nipmasuk' => $parkiran->nipmasuk,
                    'nimmasuk' => $parkiran->nimmasuk,
                    'masuk' => $parkiran->masuk,
                    'nipkeluar' => $request->nipkeluar,
                    'nimkeluar' => $request->nimkeluar,
                    'keluar' => now(),
                ]);
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
