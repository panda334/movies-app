<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequesMovie;
use App\Http\Requests\StoreTrailerRequest;
use App\Models\Movie;
use App\Models\MovieTrailer;
use App\Services\TrailerService;
use Illuminate\Http\Request;

class MovieTrailerController extends Controller
{
    public function __construct(TrailerService $trailerService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$movies = Movie::get();
        $movieTrailers = MovieTrailer::with('movie')->get();
        return view('admin.trailer.index' , compact('movieTrailers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::get();
        return view('admin.trailer.create' , compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrailerRequest $request , TrailerService $trailerService)
    {
        $data = $request->validated();
        $movieTrailer = $trailerService->addTrailer($data);
        return to_route('admintraileres.index')->with('success','trailer added successfully');;
       

    }

    /**
     * Display the specified resource.
     */
    public function show(MovieTrailer $movieTrailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieTrailer $trailere)
    {
        $movies = Movie::get();
        return view('admin.trailer.edit' , compact('trailere' , 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTrailerRequest $request, $id , TrailerService $trailerService)
    {
        $data = $request->validated();
        $movieTrailer = $trailerService->updateTrailer($data , $id);
        return to_route('admintraileres.index')->with('success','trailer updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieTrailer $trailere)
    {
        $trailere->delete();
    }
}
