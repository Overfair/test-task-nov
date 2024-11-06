<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // GET /api/genres - список жанров
    public function index(Request $request)
    {
        $genres = Genre::paginate(5);
        return response()->json($genres);
    }

    // GET /api/genres/id - определенный жанр
    public function show($id)
    {
        $genre = Genre::with('movies')->find($id);

        if (!$genre) {
            return response()->json(['error' => 'Жанр не найден'], 404);
        }

        return response()->json($genre);
    }
}
