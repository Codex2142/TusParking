<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkiran extends Model
{
    use HasFactory;

    protected $table = 'parkiran';

    protected $fillable = [
        'plat',
        'nipmasuk',
        'nimmasuk',
        'masuk',
        'keluar',
    ];

    protected $casts = [
        'masuk' => 'datetime',
        'keluar' => 'datetime',
    ];
}
