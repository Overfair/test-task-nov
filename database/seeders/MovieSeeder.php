<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Одна жизнь',
                'description' => 'Биографический фильм, основанный на реальных событиях. Энтони Хопкинс в роли человека, ' . 
                 'который спас несколько сотен детей от холокоста.',
                'is_published' => true,
                'poster' => 'posters/onelife.jpg',
            ],
            [
                'title' => 'Семь',
                'description' => 'Прекрасный актерский состав. Брэдд Питт, Гвинет Пэлтроу и Морган Фримен в захватывающем фильме.',
                'is_published' => true,
                'poster' => 'posters/theseven.jpg',
            ],
            [
                'title' => 'Перл Харбор',
                'description' => 'Американская романтическая военная драма 2001 года, четвёртый полнометражный фильм ' .
                'режиссёра Майкла Бэя, продюсеров Бэя и Джерри Брукхаймера и сценариста Рэндалла Уоллеса.',
                'is_published' => false,
                'poster' => 'posters/pearlharbor.jpg',
            ],
            [
                'title' => 'Джон Уик',
                'description' => 'Рассказ о Джоне Уике (Киану Ривз), легендарном киллере, который покончил со своей ' .
                'преступной деятельностью, но был вынужден вернуться в криминальный мир, ' .
                'чтобы отомстить за убийство своей собаки, угон машины и избиение.',
                'is_published' => true,
                'poster' => 'posters/johnwick.jpg',
            ],
            [
                'title' => 'Оппенгеймер',
                'description' => 'Эпический биографический триллер режиссёра и сценариста Кристофера Нолана, ' .
                'который рассказывает о создателе атомной бомбы Роберте Оппенгеймере.',
                'is_published' => true,
                'poster' => 'posters/oppenheimer.jpg',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
