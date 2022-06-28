<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\teacher;
use  Illuminate\Support\Facades\Auth;

class followersController extends Controller
{
    public function store(User $user, teacher $teacher){
      if (Auth::guard('web')->check()) {
          return auth()->user()->following()->toggle($user->profile);
       }
       if (Auth::guard('teacher')->check()) {
           return auth()->user()->following()->toggle($teacher->profile);
       }
    }
}
