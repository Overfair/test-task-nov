<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // GET /admin/genres - Все жанры с паджинацией (сделал 5, ибо мало заполненных жанров)
    public function index()
    {
        $genres = Genre::paginate(5);
        return view('genres.index', compact('genres'));
    }

    // GET /admin/genres/id - Показать определенный жанр
    public function show($id)
    {
        $genre = Genre::findOrFail($id);

        return view('genres.show', compact('genre'));
    }

    // GET /admin/genres/create
    public function create()
    {
        return view('genres.create');
    }

    // POST /admin/genres - Создать новый жанр
    public function store(GenreRequest $request)
    {
        Genre::create($request->validated());

        return redirect()->route('genres.index')->with('success', 'Жанр успешно создан.');
    }

    // GET /admin/genres/id/edit - Редактировать жанр
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    // PUT /admin/genres/id - Обновить существующий жанр
    public function update(GenreRequest $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($request->validated());

        return redirect()->route('genres.index')->with('success', 'Жанр успешно обновлен.');
    }

    // DELETE /admin/genres/id - Удаляем жанр
    public function delete($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Жанр успешно удален.');
    }
}
