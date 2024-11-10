<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkiran;

class dashboardController extends Controller
{
    public function read(){
        $read = parkiran::all();
        return view('dashboard.dashboard', compact('read'));
    }
}
