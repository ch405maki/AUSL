<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'action', 'ip_address', 'user_agent'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);  // 'user_id' is implied as the foreign key
    }
}

