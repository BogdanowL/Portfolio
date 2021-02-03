<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $fillable = ['sender_id', 'sent_to_id'];

    public function dialogSender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function dialogResponder()
    {
        return $this->belongsTo(User::class, 'sent_to_id');
    }

    public function getMessages()
    {
        return $this->hasMany(Message::class, 'dialog');
    }



}
