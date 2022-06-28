<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Models\course;
use App\Models\post;
use App\Models\command;
use App\Notifications\RepliedtoPro;

class Postcontroller extends Controller
{
    public function newpost(Request $request, $id){
       $request->validate([
           'post' => 'required|max:500',
           'file_post' => 'nullable|mimes:doc,pdf,docx'
       ],[
          'post.required' => 'you should write post'
       ]);
        $course = course::find($id);
        $post = new post();
        $post->profile_id = auth()->user()->profile->id;
        $post->course_id =  $course->id;
        $post->post = $request->post;

        if($request->file_post){
             $imagepath = request('file_post')->store('lectures','public');
             $post->file = $request->file_post;
        }
        $save = $post->save();

        if($save){
              return redirect()->back();
        }
    }

    public function newcommand(Request $request, $id){
        $post = post::find($id);
        $command = new command();
        $command->profile_id = auth()->user()->profile->id;
        $command->post_id = $post->id;
        $command->command = $request->command;
         $save = $command->save();
       if($save){
             $userId = auth()->user()->profile;
             auth()->user()->notify(new RepliedtoPro($userId));
       }
        
        return redirect()->back();
         
    }
    public function readnotification(){
        auth()->user()->unreadNotifications->where('id',auth()->user()->profile->id)->markAsRead();
    }
}
