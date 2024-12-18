<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class petugasController extends Controller
{
    public function read(){
        $read = petugas::all();
        return view('admin.admin-dashboard', compact('read'));
    }

    public function loadcreate(){
        return view('admin.admin-add');
    }

    public function savecreate1(Request $request){
        $request->validate([
            'nip' => 'required|integer|digits:5',
            'level'=> 'required',
            'nama' => 'required|string',
            'jeniskelamin' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        try{
            $add = new petugas;
            $add->nip = $request->nip;
            $add->nama = $request->nama;
            $add->jeniskelamin = $request->jeniskelamin;
            $add->username = $request->username;
            $add->password = Hash::make($request->password);
            $add->save();

            $add = new User;
            $add->nip = $request->nip;
            $add->level = $request->level;
            $add->username = $request->username;
            $add->password = Hash::make($request->password);
            $add->save();

            return redirect('admin-dashboard')->with('success', 'user telah ditambahkan');
        }catch(\Exception $e){
            return redirect('admin-dashboard')->with('fail', $e->getMessage());
        }
    }

    public function delete($nip){
        try{
            user::where('nip', $nip)->delete();
            petugas::where('nip', $nip)->delete();
            return redirect('/admin-dashboard')->with('success', 'Berhasil Dihapus');
        }catch(\Exception $e){
            return redirect('/admin-dashboard')->with('fail', $e->getMessage());
        }
    }

    public function loadedit($nip){
        $edit = petugas::find($nip);
        return view('admin.admin-edit', compact('edit'));
    }

    public function saveedit1(Request $request){
        $request->validate([
            'nip' => 'required|integer|digits:5',
            'level'=> 'required',
            'nama' => 'required|string',
            'jeniskelamin' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        try{
            $update = petugas::where('nip',$request->nip)->update([
                'nip'=> $request->nip,
                'nama'=> $request->nama,
                'jeniskelamin'=> $request->jeniskelamin,
                'username'=> $request->username,
                'password'=> Hash::make($request->password),
            ]);

            $update = user::where('nip',$request->nip)->update([
                'nip'=> $request->nip,
                'level' => $request->level,
                'username'=> $request->username,
                'password'=> Hash::make($request->password),
            ]);
            return redirect('/admin-dashboard')->with('success', 'Berhasil melakukan perubahan');
        }catch(\Exception $e){
            return redirect('/admin-dashboard')->with('fail', $e->getMessage());
        }
    }
}
