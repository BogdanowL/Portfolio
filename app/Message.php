<?php

namespace App;

use App\Traits\HelpTrait;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HelpTrait;
    protected $fillable = ['body', 'image', 'sent_to_id', 'sender_id', 'dialog'];

    # Сообщение принадлежит отправителю
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    # Сообщение принадлежит получателю
    public function receiver()
    {
        return $this->belongsTo(User::class, 'sent_to_id');
    }

    public function storeDialog()
    {
        return $this->belongsTo(Dialog::class, 'sender_id');
    }

    public function getDialog()
    {
        return $this->belongsTo(Dialog::class, 'sent_to_id');
    }



    public function getImage()
    {
        if ( $this->image == null)
        {
            return null;
        }
        return "/uploads/dialogs/" . $this->image;
    }


}
