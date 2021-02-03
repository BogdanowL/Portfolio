<?php

namespace App;

use App\Traits\HelpTrait;

use Cache;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /** В трейте получаем функцию загрузки изображений, а также путь сохранения изображений */
    use HelpTrait;

    protected $fillable = [
        'name', 'email', 'password', 'age', 'gender', 'avatar', 'about_me',
        'city', 'country', 'status'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # /_________ Устанавливаем отношения________/

    # Устанавливаем отношения с моделью Album
    public function album()
    {
        return $this->hasMany(Album::class);
    }

    # Устанавливаем отношения с моделью Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    # Устанавливаем отношения с моделью Message,
    # здесь пользователь отправляет сообщение
    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    # Устанавливаем отношения с моделью Message,
    # здесь получатель сообщения
    public function received()
    {
        return $this->hasMany(Message::class, 'sent_to_id');
    }


    public function sentDialog()
    {
        return $this->hasMany(Dialog::class, 'sender_id');
    }


    public function receivedDialog()
    {
        return $this->hasMany(Dialog::class, 'sent_to_id');
    }



    # /_________ Основные функции________/

    #Првоеряем онлайн статус пользователя
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }


    #Получаем аватар пользователя
    public function getAvatar()
    {
        if ($this->image == null and $this->gender == 0)
        {
            return '/default/male.png';
        }
        elseif ($this->image == null and $this->gender == 1)
        {
            return '/default/female (2).png';
        }
         return "/uploads/avatars/id{$this->id}/" . $this->image;
    }

    # Удаляем старую аватарку
    public function removeAvatar()
    {
        if ($this->image != null)
        Storage::delete("uploads/avatars/id{$this->id}/" . $this->image);
    }


    # Загружаем аватарку и удаляем старую
    public function uploadAvatar($image)
    {
        if ($image == null) { return;}
        $this->removeAvatar();
        $this->uploadImage($image, 'avatars');
    }

    # здесь получаем пол пользователя
    public function getGender()
    {
        if ($this->gender == 0)
        {
            return 'Мужской';
        }
        if ($this->gender == 1)
        {
            return 'Женский';
        }
    }



}
