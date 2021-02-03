<?php

namespace App;


use App\Traits\HelpTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    /** В трейте получаем функцию загрузки изображений, а также путь сохранения изображений */
    use HelpTrait;

    protected $fillable = ['image', 'description', 'title'];

    # /_________ Устанавливаем отношения________/


    # Устанавливаем отношения с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    # /_________ Основные функции________/


    # получаем фото для поста
    public function getPostPhoto($id)
    {
        if ( $this->image == null)
        {
            return null;
        }
        return "/uploads/posts/id{$id}/" . $this->image;
    }

    # здесь удаляем картинку поста
    public function removePostImage()
    {
        $user = Auth::user()->id;
        if ($this->image != null)
        {
            Storage::delete("uploads/posts/id{$user}/" . $this->image);
        }
    }

    # здесь удаляем картинку, затем пост из БД
    public function removePost()
    {
        $this->removePostImage();
        $this->delete();
    }

}
