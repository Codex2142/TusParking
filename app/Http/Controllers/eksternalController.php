<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\eksternal;
use Illuminate\Http\Request;

class eksternalController extends Controller
{
    public function read()
    {
        $read = eksternal::all();
        return view('eksternal.riwayat', compact('read'));
    }

    public function load(){
        return view('eksternal.create');
    }

    public function createfoto(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'keperluan' => 'required|string',
            'linkfoto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('linkfoto')) {
                $filePath = $request->file('linkfoto')->store('eksternal_fotos', 'public');
            }

            $eksternal = new Eksternal;
            $eksternal->nama = $request->nama;
            $eksternal->identitas = $request->identitas;
            $eksternal->keperluan = $request->keperluan;
            $eksternal->linkfoto = $filePath;
            $eksternal->tanggal = Carbon::now();
            $eksternal->save();

            return redirect('/pengecualian')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect('/tambahkan-pengunjung')->with('fail', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
