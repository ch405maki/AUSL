<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAnalytic extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_name',
        'route_path',
        'ip_address',
        'user_agent',
        'visitor_id',
        'session_id',
        'is_bot',
        'visited_at',
        'exclude_from_top_pages',
    ];

    protected $casts = [
        'is_bot' => 'boolean',
        'exclude_from_top_pages' => 'boolean',
        'visited_at' => 'datetime',
    ];
}
