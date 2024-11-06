<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'is_published', 'poster'];

    // Связь many to many, а также форсим название связи
    public function genres() {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }
}
