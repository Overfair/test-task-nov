<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // GET /api/movies - список фильмов
    public function index(Request $request)
    {
        $movies = Movie::paginate(5);
        return response()->json($movies);
    }

    // GET /api/movies/id - определенный фильм
    public function show($id)
    {
        $movie = Movie::with('genres')->find($id);

        if (!$movie) {
            return response()->json(['error' => 'Фильм не найден'], 404);
        }

        return response()->json($movie);
    }
}
