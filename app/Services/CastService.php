<?php

namespace App\Services;

use App\Models\Cast;
class CastService
{
  

    public function addCast($data)
    {
        $cast=Cast::create($data);
        return $cast;
    }

    public function updateCast($data , $id)
    {
        $cast=Cast::findOrFail($id);
        //dd($data);
        $cast->update($data);
        return $cast;
    

    }
}