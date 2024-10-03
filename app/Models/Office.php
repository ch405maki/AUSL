<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $table = 'offices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'office_name',
        'office_location',
        'category',
        'image',
    ];

    protected $casts = [
        'image' => 'array', 
    ];

    // Override the setImagesAttribute to handle JSON encoding
    public function setImagesAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    // Override the getImagesAttribute to handle JSON decoding
    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}
