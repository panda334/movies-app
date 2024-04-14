<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class MovieController extends Controller
{
   
    public function index()
    {
        $user = User::get();
        $movies = Movie::paginate(5);
        return view('user_interface.movies' , compact('movies' , 'user'));
    }

    public function topMovie()
    {
        $movies = Movie::orderBy('rate' , 'DESC')->paginate(5);
        return view('user_interface.movies' , compact('movies'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $movies = Movie::where('name','LIKE','%'.$q.'%')
                       ->paginate();
        if(count($movies) > 0)
            return view('user_interface.movies' , compact('movies'))->withDetails($movies)->withQuery ( $q );
           else
        return view ('user_interface.index' , compact('movies'))->withMessage('No Details found. Try to search again !');
    }
 
   
}
