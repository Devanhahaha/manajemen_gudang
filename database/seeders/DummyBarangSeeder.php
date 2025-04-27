<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'nama_barang' => 'Gas LPG',
            'kategori' => 'Gas LPG 3 Kg',
            'kode_barang' => 351,
            'stock' => 10,
            'tanggal_masuk' => '2025-04-27',
            'images' => 'storage/files/barang/gas_lpg.jpg',
        ]);
    }
}
