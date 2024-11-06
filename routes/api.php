<?php

use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/genres', [GenreController::class, 'index']); // Paginated list of products
Route::get('/genres/{id}', [GenreController::class, 'show']); // Show single product

Route::get('/movies', [MovieController::class, 'index']); // Paginated list of categories
Route::get('/movies/{id}', [MovieController::class, 'show']); // Show single category