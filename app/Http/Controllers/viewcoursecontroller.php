<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\profile;

class viewcoursecontroller extends Controller
{
     public function view(){
        $courses = course::all();
        $profile = profile::select('id','username')->get();

        return view('dashboard.viewcourse',compact('courses','profile'));
     }
}
