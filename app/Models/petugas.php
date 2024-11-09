<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    use HasFactory;
    protected $primaryKey = 'nip'; // Menetapkan nip sebagai primary key
    public $incrementing = false; // Jika nip bukan auto-increment
    protected $keyType = 'string'; // Jika nip bukan integer

    protected $fillable = [
        'nip',
        'nama',
        'jeniskelamin',
        'username',
        'password',
    ];
}
