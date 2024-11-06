<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    // Связь many to many, а также форсим название связи
    public function movies() {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }
}
