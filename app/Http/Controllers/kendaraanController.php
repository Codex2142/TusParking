<?php

namespace App\Http\Controllers;

use App\Models\kendaraan;
use Illuminate\Http\Request;

class kendaraanController extends Controller
{
    public function read()
    {
        $read = kendaraan::with('kategori')->get();
        return view('kendaraan.read', compact('read'));
    }


    public function delete($plat){
        try{
            kendaraan::where('plat', $plat)->delete();
            return redirect('/daftar-kendaraan')->with('success', 'Berhasil Dihapus');
        }catch(\Exception $e){
            return redirect('/daftar-kendaraan')->with('fail', $e->getMessage());
        }
    }

    public function loadcreate(){
        return view('kendaraan.create');
    }

    public function savecreate(Request $request){
        $request->validate([
            'plat' => 'required|max:10',
            'nim' => 'required|integer|min:5',
            'nama'=>'required|string',
            'kategori'=>'required',
            'masaaktif'=>'required',
        ]);
        try{
            $add = new kendaraan();
            $add->plat = $request->plat;
            $add->nim = $request->nim;
            $add->nama = $request->nama;
            $add->kategori = $request->kategori;
            $add->masaaktif = $request->masaaktif;
            $add->save();

            return redirect('daftar-kendaraan')->with('success', 'user telah ditambahkan');
        }catch(\Exception $e){
            return redirect('daftar-kendaraan')->with('fail', $e->getMessage());
        }
    }

    public function loadedit($plat){
        $edit = kendaraan::find($plat);
        return view('kendaraan.update', compact('edit'));
    }


    public function saveedit(Request $request){
        $request->validate([
            'plat' => 'required|max:10',
            'nim' => 'required|integer|min:5',
            'nama'=>'required|string',
            'kategori'=>'required',
            'masaaktif'=>'required',
        ]);
        try{
            $update = kendaraan::where('plat',$request->plat)->update([
                'plat'=> $request->plat,
                'nim'=> $request->nim,
                'nama'=> $request->nama,
                'kategori'=> $request->kategori,
                'masaaktif'=> $request->masaaktif,
            ]);
            return redirect('/daftar-kendaraan')->with('success', 'Berhasil melakukan perubahan');
        }catch(\Exception $e){
            return redirect('/daftar-kendaraan')->with('fail', $e->getMessage());
        }
    }

}
