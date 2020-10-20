<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function messages(){
        return $this->belongsToMany(Message::class,'messages_tags','tag_id','message_id');
    }
}
