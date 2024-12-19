<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Riwayat;
use App\Models\Parkiran;
use Illuminate\Http\Request;

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
                    'keluar' => Carbon::now('Asia/Jakarta'),
                ]);
                Parkiran::where('plat', $parkiran->plat)->delete();

                return redirect('/keluar')->with('success', 'Berhasil Keluar');
            } catch (\Exception $e) {
                return redirect('/keluar')->with('fail', $e->getMessage());
            }
        } else {
            return redirect('/keluar')->with('fail', 'Data parkiran tidak ditemukan');
        }
    }
}
