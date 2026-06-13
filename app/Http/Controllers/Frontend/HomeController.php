<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function homePage()
    {
        $movies = Movie::paginate(10);
        return view('user_interface.index', compact('movies'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => ['required', 'string', 'max:255'],
        ]);

        $q = trim($request->input('q'));

        $movies = Movie::where('name', 'LIKE', '%' . $q . '%')
                       ->paginate(10); //
        if ($movies->count() > 0) {
            return view('user_interface.index', compact('movies', 'q'));
        }

        return view('user_interface.index', [
            'movies'  => $movies,
            'q'       => $q,
            'message' => 'No results found. Try a different search term.',
        ]);
    }
}
