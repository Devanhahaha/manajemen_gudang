<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $fillable = [
        'barang_id',
        'pegawai_id',
        'nama_barang',
        'kategori',
        'jumlah',
        'tanggal_keluar',
        'keterangan',
        'dikeluarkan_oleh',
        'images',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
