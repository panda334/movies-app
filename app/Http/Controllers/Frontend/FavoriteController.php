<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Movie;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Maize\Markable\Models\Favorite as ModelsFavorite;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {

    $userId = Auth::id();
    $movies = Movie::has('favorites')
        ->whereHas('favorites', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->paginate();

      return view('user_interface.favoriteMovies' , compact('movies' ));
    }

    public function addFavoriteMovies(Request $request ,Movie $movie , User $user)
    {
        $favorite = Favorite::get();
        $movie = Movie::findOrFail($movie->id);
        $user = User::findOrFail($user->id);
        if ($user->favorites()->where('movie_id', $movie->id)->exists()) {
            $favorite = Favorite::where('user_id', $user->id)
            ->where('movie_id', $movie->id)
            ->first();
            $favorite->delete();
            return redirect()->back();
        }
        else{
        $favorite = Favorite::create([
            'movie_id' => $movie->id,
            'user_id' => $user->id
        ]);
        $favorite->save();
        return redirect()->back();
    }
        //$user->favorites->attach($request->input('user_id' , []));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
    }
}
