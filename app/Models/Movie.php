<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Movie extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'story', 'language', 'length', 'date', 'rate', 'file'];

    public function actors()
    {
        return $this->belongsToMany(Cast::class, 'cast_movie');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie');
    }

    public function trailers()
    {
        return $this->hasMany(MovieTrailer::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function fileUpload()
    {
        return $this->hasOne(FileUpload::class);
    }

    public function getFileLinkAttribute()
    {
        return $this->file ? Storage::url($this->file) : null;
    }
}
