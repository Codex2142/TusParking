<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register()
    {
        return view('admin.admin-register');
    }

    public function createregis(Request $request){
        $request->validate([
            'nip' => 'required|integer|digits:5',
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
            $add->level = 'petugas';
            $add->username = $request->username;
            $add->password = Hash::make($request->password);
            $add->save();

            return redirect('/login');
        }catch(\Exception $e){
            return redirect('/register')->with('fail', $e->getMessage());
        }
    }
}
