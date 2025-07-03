<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "first_name" => "Admin",
            "last_name" => "Admin",
            "email" => "marcelokace@gmail.com",
            "password" => bcrypt(env('ADMIN_PASSWORD')),
            "state_id" => 18,
            "role_id" => 1
        ]);

        User::create([
            "first_name" => "Gabriel",
            "last_name" => "Ledesma",
            "email" => "gabialessandroledesma@gmail.com",
            "password" => bcrypt(env('ADMIN_PASSWORD')),
            "state_id" => 18,
            "role_id" => 1,
        ]);
    }
}
