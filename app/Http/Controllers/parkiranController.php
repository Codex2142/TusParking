<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Petugas;
use App\Models\Parkiran;
use Illuminate\Http\Request;

class ParkiranController extends Controller
{

    public function read(){
        $read = parkiran::all();
        return view('keluar.keluar', compact('read'));
    }

    public function loadedit($id){
        $edit = parkiran::find($id);
        return view('keluar.keluar-validasi', compact('edit'));
    }


    public function verifikasi(Request $request)
    {
        $kendaraan = Kendaraan::where('plat', $request->plat)->first();

        $petugas = Petugas::where('nip', $request->nip)->first();

        if (!$kendaraan || !$petugas) {
            session()->flash('fail', 'Data kendaraan atau petugas tidak ditemukan');
            return redirect('/masuk');
        }

        $parkirExist = Parkiran::where('plat', $kendaraan->plat)->first();
        if ($parkirExist) {
            session()->flash('fail', 'Kendaraan sudah terparkir');
            return redirect('/masuk');
        }

        Parkiran::create([
            'plat' => $kendaraan->plat,
            'nimmasuk' => $kendaraan->nim,
            'nipmasuk' => $petugas->nip,
            'waktu_masuk' => now(),
        ]);

        session()->flash('success', 'Kendaraan berhasil terparkir');
        return redirect('/keluar');
    }
}

