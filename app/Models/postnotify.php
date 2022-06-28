<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postnotify extends Model
{
    use HasFactory;

    protected $fillable = [
        'command_id',
        'profile_name',
        'profile_email',
        
    ];
}
