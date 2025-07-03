<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('status')->insert([
            ['description' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'cancelled', 'created_at' => now(), 'updated_at' => now()],
            ['description' => 'attended', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
