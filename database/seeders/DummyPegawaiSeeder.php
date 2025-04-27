<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'nama_pegawai' => 'John Doe',
            'alamat_pegawai' => 'Bandung',
            'no_telp' => '628123456789',
            'jabatan' => 'Operator Gudang',
            'images' => 'storage/files/pegawai/john_doe.jpg',
        ]);
    }
}
