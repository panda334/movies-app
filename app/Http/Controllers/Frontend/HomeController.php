<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OpenAdmin\Admin\Grid\Displayers\Input;

class HomeController extends Controller
{
    public function homePage()
    {
        $movies = Movie::paginate(10);
        return view('user_interface.index' , compact('movies'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $movies = Movie::where('name','LIKE','%'.$q.'%')
                       ->paginate();
        if(count($movies) > 0)
            return view('user_interface.index' , compact('movies'))->withDetails($movies)->withQuery ( $q );
           else
        return view ('user_interface.index')->withMessage('No Details found. Try to search again !');
    }
}
