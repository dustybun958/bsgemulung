<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan factory atau langsung membuat user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'alamat' => 'Magelang',
            'no_telepon' => '08123456789',
            'password' => bcrypt('password'), // Gunakan bcrypt untuk mengenkripsi password
        ]);

        // Tambahkan data lainnya jika perlu
    }
}
