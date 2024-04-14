<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;







class Cast extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable = ['first_name' , 'last_name' , 'job'];

    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(150)
              ->height(150)
              ->sharpen(10);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class ,'cast_movie');
    }
}
