<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $roleSuper = \App\Models\User::create(['name' => 'super-admin']);


        $user = \App\Models\User::create([
            'name' => 'Endang',
            'email' => 'endang@gmail.com',
            'alamat' => 'Super',
            'no_telepon' => '085156182381',
            'password' => bcrypt('qwerty123'),
        ]);
    }
}
