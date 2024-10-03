<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'images'];

    protected $casts = [
        'images' => 'array', 
    ];

    // Override the setImagesAttribute to handle JSON encoding
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    // Override the getImagesAttribute to handle JSON decoding
    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}
