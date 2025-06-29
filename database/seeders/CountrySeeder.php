<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $COUNTRIES = array(
            ["id" => 1, "description" => "ARGENTINA"],
            ["id" => 2, "description" => "BRASIL"],
            ["id" => 3, "description" => "PARAGUAY"]);

        foreach ($COUNTRIES as $country) {
            Country::firstOrCreate([
                "id" => $country["id"]
            ], [
                "description" => $country["description"]
            ]);
        }
    }
}
