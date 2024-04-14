<?php

namespace App\Services;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieService
{
  

    public function addMovie($data)
    {
        $movie=Movie::create($data);
        return $movie;
    }

    public function updateMovie($data , $id)
    {
        $movie=Movie::findOrFail($id);
        //dd($data);
        $movie->update($data);
        return $movie;
    

    }
}