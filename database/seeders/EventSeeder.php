<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'user_id' => 1,
            'title' => 'Maratón Ciudad de Buenos Aires',
            'description' => 'Competencia anual de 42 km en la ciudad.',
            'date_time' => '2025-09-10 07:00:00',
            'location' => 'Avenida 9 de Julio',
            'capacity' => 1500,
            'category_id' => 5
        ]);

        Event::create([
            'user_id' => 2,
            'title' => 'Torneo de Básquet Regional',
            'description' => 'Competencia entre clubes de la región.',
            'date_time' => '2025-09-20 18:00:00',
            'location' => 'Gimnasio Municipal',
            'capacity' => 600,
            'category_id' => 2
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Partido de Rugby Amistoso',
            'description' => 'Encuentro amistoso entre equipos locales.',
            'date_time' => '2025-09-25 16:00:00',
            'location' => 'Estadio Central',
            'capacity' => 400,
            'category_id' => 8
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Competencia de Natación',
            'description' => 'Pruebas de natación en distintas categorías.',
            'date_time' => '2025-10-05 10:00:00',
            'location' => 'Piscina Olímpica',
            'capacity' => 200,
            'category_id' => 4
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Torneo de Tenis Local',
            'description' => 'Competencia abierta para jugadores amateurs.',
            'date_time' => '2025-10-15 14:00:00',
            'location' => 'Club de Tenis',
            'capacity' => 100,
            'category_id' => 3
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Carrera de Ciclismo Urbana',
            'description' => 'Circuito por las calles principales de la ciudad.',
            'date_time' => '2025-10-25 08:00:00',
            'location' => 'Centro Urbano',
            'capacity' => 500,
            'category_id' => 6
        ]);

        Event::create([
            'user_id' => 3,
            'title' => 'Campeonato de Vóley Playa',
            'description' => 'Competencia de equipos en la playa local.',
            'date_time' => '2025-11-01 09:00:00',
            'location' => 'Playa Sur',
            'capacity' => 150,
            'category_id' => 8
        ]);
    }
}
