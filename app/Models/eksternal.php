<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eksternal extends Model
{
    use HasFactory;

    protected $table = 'eksternal';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'identitas',
        'keperluan',
        'linkfoto',
    ];
}