<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatmessage extends Model
{
    use HasFactory;

    public function room(){
        return $this->hasOne(chatroom::class, 'id', 'chat_room_id');
    }
    public function profile(){
        return $this->hasOne(profile::class, 'id', 'user_id');
    }

}
