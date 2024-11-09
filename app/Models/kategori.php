<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Nama tabel

    protected $fillable = [
        'kategori', // Nama kategori
    ];

    // Relasi hasMany ke model Kendaraan
    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'kategori', 'id');
    }
}
