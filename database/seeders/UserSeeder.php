<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'Admin',
            'last_name' => 'Principal',
            'email' => 'admin@example.com',
            'password' => Hash::make('Admin123'),
            'state_id' => 18,
            'role_id' => 1,
        ]);

        User::create([
            'first_name' => 'Organizador',
            'last_name' => 'Eventos',
            'email' => 'organizer@example.com',
            'password' => Hash::make('Org123'),
            'state_id' => 18,
            'role_id' => 2,
        ]);

        User::create([
            'first_name' => 'Usuario',
            'last_name' => 'Normal',
            'email' => 'user@example.com',
            'password' => Hash::make('User123'),
            'state_id' => 18,
            'role_id' => 3,
        ]);
    }
}
