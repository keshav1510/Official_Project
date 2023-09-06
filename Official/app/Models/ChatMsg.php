<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMsg extends Model
{
    use HasFactory;
    protected $table="chat_msgs";
    protected $fillable=['Sender_Id','Receiver_Id','Message','Convo_Id'];
   
}
