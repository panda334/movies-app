<?php
namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Log;

class MovieService
{
    public function addMovie($data)
    {
        try {
            $movie = Movie::create($data);
            return $movie;
        } catch (\Exception $e) {
            Log::error('Failed to create movie: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateMovie($data, $id)
    {
        try {
            $movie = Movie::findOrFail($id);
            $movie->update($data);
            return $movie;
        } catch (\Exception $e) {
            Log::error('Failed to update movie ID ' . $id . ': ' . $e->getMessage());
            throw $e;
        }
    }
}
