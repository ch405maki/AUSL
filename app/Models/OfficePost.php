<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficePost extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'office_post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'title',
        'content',
        'image',
        'link',
        'state',
        'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
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
