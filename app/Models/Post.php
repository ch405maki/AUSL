<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'content', 'image', 'category', 'state', 'link', 'created_at', 'pubmat'];

    protected $casts = [
        'image' => 'array',
    ];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $value ? json_encode($value) : null;
    }

    public function getImageAttribute($value)
    {
        return $value ? json_decode($value, true) : null;
    }
}

