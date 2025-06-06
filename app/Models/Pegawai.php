<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama_pegawai',
        'jabatan',
        'alamat_pegawai',
        'no_telp',
        'images',
    ];
}
