<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieTrailer extends Model
{
    protected $fillable = ['title' , 'url' , 'movie_id'];

    use HasFactory;


    public function movie()
    {
        return $this->belongsTo(Movie::class , 'movie_id');
    }
}
