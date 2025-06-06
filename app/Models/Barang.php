<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'kategori',
        'kode_barang',
        'stock',
        'tanggal_masuk',
        'images',
    ];
}
