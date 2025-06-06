<?php

namespace Database\Seeders;

use App\Models\BarangKeluar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangKeluar::create([
            'nama_barang' => 'Laptop',
            'kategori' => 'Elektronik',
            'jumlah' => 5,
            'tanggal_keluar' => now(),
            'keterangan' => 'Untuk keperluan proyek',
            'dikeluarkan_oleh' => 'John Doe',
            'images' => 'storage/files/barang/laptop.jpg',
        ]);
    }
}
