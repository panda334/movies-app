<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieSingleController extends Controller
{
    public function getMovieDetailes($id)
    {
        $movies = Movie::findOrFail($id);
        return view('user_interface.single_movie' , compact('movies'));
    }
}
