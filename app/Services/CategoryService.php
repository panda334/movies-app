<?php

namespace App\Services;

use App\Models\Category;
class CategoryService
{
  

    public function addCategory($data)
    {
        $category=Category::create($data);
        return $category;
    }

    public function updateCategory($data , $id)
    {
        $category=Category::findOrFail($id);
        $category->update($data);
        //dd($category);

    }
}