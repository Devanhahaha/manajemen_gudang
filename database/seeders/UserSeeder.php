<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'pegawai',
        ]);

        User::create([
            'name' => 'Admin',
            'first_name' => 'Devan',
            'last_name' => 'Herdiansyah',
            'email' => 'devanherdiansyah74@gmail.com',
            'password' => Hash::make(123456),
        ])->assignRole('admin');

        User::create([
            'name' => 'Pegawai',
            'first_name' => 'Jhon',
            'last_name' => 'Dhoe',
            'email' => 'jhondhoe@gmail.com',
            'password' => Hash::make(78909),
        ])->assignRole('pegawai');
    }
}
