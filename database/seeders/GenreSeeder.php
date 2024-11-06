<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Комедия'],
            ['name' => 'Драма'],
            ['name' => 'Биография'],
            ['name' => 'Боевик'],
            ['name' => 'Вестерн'],
            ['name' => 'Хоррор'],
            ['name' => 'Триллер'],
            ['name' => 'Детектив'],
            ['name' => 'Фантастика']
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
