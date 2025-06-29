<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ROLS = array(
            ["id" => 1, "description" => "ADMIN"],
            ["id" => 2, "description" => "ORGANIZER"],
            ["id" => 3, "description" => "CUSTOMER"]);

        foreach ($ROLS as $rol) {
            Role::firstOrCreate([
                "id" => $rol["id"]
            ], [
                "description" => $rol["description"]
            ]);
        }
    }
}
