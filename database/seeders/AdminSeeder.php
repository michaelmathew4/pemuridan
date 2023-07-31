<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'id_user' => '12345678',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'SuperAdmin',
            'institusi' => 'SuperAdmin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);
    }
}
