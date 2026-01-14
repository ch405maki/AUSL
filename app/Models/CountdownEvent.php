<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountdownEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'target_date',
        'type',
        'is_active',
    ];
}
