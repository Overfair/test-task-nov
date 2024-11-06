<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Movie;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем нужные жанры
        $drama = Genre::where('name', 'Драма')->first();
        $bio = Genre::where('name', 'Биография')->first();
        $detective = Genre::where('name', 'Детектив')->first();
        $action = Genre::where('name', 'Боевик')->first();
        $thriller = Genre::where('name', 'Триллер')->first();

        // Получаем нужные фильмы
        $oneLife = Movie::where('title', 'Одна жизнь')->first();
        $seven = Movie::where('title', 'Семь')->first();
        $pearl = Movie::where('title', 'Перл Харбор')->first();
        $johnWick = Movie::where('title', 'Джон Уик')->first();
        $oppenheimer = Movie::where('title', 'Оппенгеймер')->first();

        // Заполняем табличку со связями
        $drama->movies()->attach([$oneLife->id, $pearl->id, $oppenheimer->id]);
        $bio->movies()->attach([$oneLife->id, $pearl->id, $oppenheimer->id]);
        $detective->movies()->attach([$seven->id]);
        $action->movies()->attach([$seven->id, $pearl->id, $johnWick->id]);
        $thriller->movies()->attach([$seven->id, $johnWick->id]);
        
    }
}
