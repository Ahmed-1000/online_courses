<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'course_id',
        'section_name',
        'section_description',
        
        
    ];

    
    public  function add_id(){
      
        $courses = course::where('owner_course',auth()->user()->profile->id)->get();
        
            
             section::insert([
                'course_id' => $courses->id
             ]);
        
    }
    
}
