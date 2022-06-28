<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chatroom;
use App\Models\chatmessage;
use App\Models\profile;
use  Illuminate\Support\Facades\Auth;

class Chatcontroller extends Controller
{
    public function room(Request $request){
       return chatroom::all();
    }
    public function message(Request $request, $roomId){
        return chatmessage::where('chat_room_id', $roomId)->with('profile')->orderBy('created_at','DESC')->get();
    }
    public function  newmessage(Request $request, $roomId){
         $newMessage = new chatmessage;
         $newMessage->user_id = auth()->user()->profile->id;
         $newMessage->chat_room_id = $roomId;
         $newMessage->message = $request->message;
         $newMessage->save();

         return $newMessage;
    }
    public function search(Request $request){
       
        return profile::where('username', $request->keywords)->get();
    }

}
