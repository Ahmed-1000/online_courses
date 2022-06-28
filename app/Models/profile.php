<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class profile extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'image',
        'status',
    ];
  
    public function imageprofile(){
        $Imagepath = ($this->image) ? $this->image : 'profile/l60Hf.png';

        return '/storage/'.$Imagepath; 
    }
    public function course(){
        return $this->hasMany(course::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->hasMany(post::class);
    }
    public function followers(){
        return $this->belongsToMany(User::class);
    }
    public function followerss(){
        return $this->belongsToMany(teacher::class);
    }
   
    
}
