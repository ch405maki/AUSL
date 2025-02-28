<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'year_level',
        'full_name',
        'email',
        'contact_number',
        'document',
        'printing_by',
        'encoded_by',
        'pending_item',
        'gwa',
        'status',
        'remarks',
    ];
}