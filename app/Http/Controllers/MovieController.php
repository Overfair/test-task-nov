<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // GET /admin/movies - Все фильмы с паджинацией (сделал 5, ибо мало заполненных фильмов)
    public function index()
    {
        $movies = Movie::paginate(5);
        return view('movies.index', compact('movies'));
    }

    // GET /admin/movies/id - Показать определенный жанр
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return view('movies.show', compact('movie', 'genres'));
    }

    // GET /admin/movies/create
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    // POST /admin/movies - Создать новый фильм
    public function store(MovieRequest $request)
    {
        $data = $request->validated();
        $data['is_published'] = false; // Изначально фильм не опубликован

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        } else {
            $data['poster'] = 'default.png';
        }

        $movie = Movie::create($data);
        $movie->genres()->sync($request->input('genres', []));

        return redirect()->route('movies.index')->with('success', 'Фильм успешно создан.');
    }

    // GET /admin/movies/id/edit - Редактировать фильм
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres'));
    }

    // PUT /admin/movies/id - Обновить существующий фильм
    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            if ($movie->poster && $movie->poster !== 'default.png') {
                Storage::disk('public')->delete($movie->poster);
            }
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update($data);
        $movie->genres()->sync($request->input('genres', []));

        return redirect()->route('movies.index')->with('success', 'Фильм успешно обновлен.');
    }

    // DELETE /admin/movies/id - Удаляем фильм
    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Фильм успешно удален.');
    }
    
    // POST /admin/movies/id/publish - Опубликовать фильм
    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->is_published = true;
        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Фильм успешно опубликован.');
    }
}
