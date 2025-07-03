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
        #$response = Http::get("https://apis.datos.gob.ar/georef/api/provincias");
        // Uso withoutVerifying() hasta que pueda configurar el certificado SSL en mi entorno local
        // Esto es necesario porque la API de datos.gob.ar usa HTTPS y mi entorno local no
        // tiene un certificado SSL válido, lo que causa un error de verificación de certificado.


        $response = Http::withoutVerifying()->get("https://apis.datos.gob.ar/georef/api/provincias");


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
