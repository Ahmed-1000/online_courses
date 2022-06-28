<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){

         return $this->hasOne(profile::class);
    }
    public function following(){
        return $this->belongsToMany(profile::class);
    }
   

    protected static function boot(){
        parent::boot();
      
        static::created(function ($teacher){
             $teacher->profile()->create([
                 'username' => $teacher->name,
                 'email' => $teacher->email,
                 'status' => 'teacher',
             ]);
        });
    }
}
