<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnLoadBanner extends Model
{
    use HasFactory;

    protected $table = 'onload_banners'; 

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
