<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get("https://apis.datos.gob.ar/georef/api/provincias");

        collect($response->object()->provincias)->map(function (object $state) {
            $state = State::updateOrCreate([
                "id" => $state->id
            ], [
                "description" => $state->nombre,
                "country_id" => 1
            ]);
        });
    }
}
