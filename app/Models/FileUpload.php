<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    protected $fillable = ['link'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
