<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatroom extends Model
{
    use HasFactory;

    public function message(){
        return $this->hasMany(chatmessage::class);
    }
}
