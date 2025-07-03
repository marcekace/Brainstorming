<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Fútbol',
            'Básquetbol',
            'Tenis',
            'Natación',
            'Atletismo',
            'Ciclismo',
            'Vóley',
            'Rugby',
            'Boxeo',
            'Artes marciales',
        ];

        foreach ($categories as $description) {
            Category::updateOrCreate(
                ['description' => $description],
                ['description' => $description]
            );
        }
    }
}
