<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnLoadBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'icon',
        'confirmButtonText',
        'cancelButtonText',
        'url',
        'state',
    ];
    
}
