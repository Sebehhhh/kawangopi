<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Seman',
            'email' => 'muhammad.seman030801@gmail.com',
            'password' => bcrypt('Seman@123'),
            'alamat' => 'Alamat Pengguna',
            'telp' => '08123456789',
        ]);
    }
}