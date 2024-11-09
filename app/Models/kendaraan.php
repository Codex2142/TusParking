<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    protected $table = 'kendaraan'; // Menetapkan nama tabel
    protected $primaryKey = 'plat'; // Menetapkan plat sebagai primary key
    public $incrementing = false; // Jika plat bukan auto-increment
    protected $keyType = 'string'; // Jika plat bukan integer

    protected $fillable = [
        'plat',
        'nim',
        'nama',
        'kategori',
        'masaaktif',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori', 'id');
    }
}
