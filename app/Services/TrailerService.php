<?php

namespace App\Services;

use App\Models\MovieTrailer;
class TrailerService
{
  

    public function addTrailer($data)
    {
        $movieTrailer=MovieTrailer::create($data);
        return $movieTrailer;
    }

    public function updateTrailer($data , $id)
    {
        $movieTrailer=MovieTrailer::findOrFail($id);
        //dd($data);
        $movieTrailer->update($data);
    

    }
}