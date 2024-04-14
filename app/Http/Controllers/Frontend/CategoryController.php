<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function moviesByCategory($id)
    {
        $category = Category::findOrFail($id);
        $movies = $category->movies;
        $categories = Category::get();
        return view('user_interface.moviesByCategory' , compact('movies' , 'categories'));
    }

    public function index()
    {
        $movies = Movie::get();
        $categories = Category::all();
        return view('user_interface.moviesByCategory' , compact('categories' , 'movies'));
    }
}
