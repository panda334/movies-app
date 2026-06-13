<?php
namespace App\Http\Controllers\Admin;

use App\Models\Cast;
use App\Models\Movie;
use App\Models\Category;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use App\Services\MovieService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequesMovie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with([
            'actors' => function ($query) {
                $query->select('casts.id', 'casts.first_name');
            },
            'categories' => function ($query) {
                $query->select('categories.id', 'categories.name');
            }
        ])->get();

        return view('admin.movie.index', compact('movies'));
    }

    public function create()
    {
        $casts = Cast::get();
        $categories = Category::get();
        $movies = Movie::get();
        return view('admin.movie.create', compact('casts', 'categories', 'movies'));
    }

    public function store(StoreRequesMovie $request, MovieService $movieService)
    {
        $data = $request->validated();
        $movie = $movieService->addMovie($data);

        $fileUpload = FileUpload::latest()->first();
        $movie->file = $fileUpload->link;

        $movie->actors()->attach($request->input('cast_id', []));
        $movie->categories()->attach($request->input('category_id', []));

        $movie->addMediaFromRequest('image')
              ->toMediaCollection('images');

        $movie->save();

        return to_route('adminmovies.index')->with('success', 'Movie added successfully');
    }

    public function downloadFile($id)
    {
        $movie = Movie::findOrFail($id);

        $path = storage_path('app/public/' . $movie->file);

        if (!file_exists($path)) {
            return back()->with('error', 'File not found.');
        }

        return response()->download($path, $movie->name . '.mp4');
    }

    public function watchOnline($id)
    {
        $movie = Movie::findOrFail($id);

        $path = storage_path('app/public/' . $movie->file);

        if (!file_exists($path)) {
            return back()->with('error', 'File not found.');
        }

        return response()->file($path);
    }

    public function show(Movie $movie)
    {
        //
    }

    public function edit(Movie $movie)
    {
        $casts = Cast::get();
        $categories = Category::get();
        return view('admin.movie.edit', compact('movie', 'casts', 'categories'));
    }

    public function update(StoreRequesMovie $request, $id, MovieService $movieService)
    {
        $data = $request->validated();
        $movie = $movieService->updateMovie($data, $id);

        $movie->actors()->syncWithoutDetaching($request->input('cast_id', []));
        $movie->categories()->syncWithoutDetaching($request->input('category_id', []));

        if ($request->hasFile('image')) {
            $movie->clearMediaCollection('images');
            $movie->addMediaFromRequest('image')
                  ->toMediaCollection('images');
        }

        return to_route('adminmovies.index')->with('success', 'Movie updated successfully');
    }

    public function destroy(Movie $movie)
    {
        $filePath = storage_path('app/public/' . $movie->file);
        if (file_exists($filePath)) {
            unlink($filePath); // 
        }

        $movie->clearMediaCollection('images');

        $movie->delete();

        return to_route('adminmovies.index')->with('success', 'Movie deleted successfully');
    }
}
