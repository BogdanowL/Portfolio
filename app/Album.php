<?php

namespace App;

use App\Traits\HelpTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Album extends Model
{

    /** В трейте получаем функцию загрузки изображений, а также путь сохранения изображений */
    use HelpTrait;

    protected $fillable = [ 'image' ];

    # устанавливаем отношения с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    #  удаляем последнюю фотографию если больше 4х
    public function deleteExcess()
    {
        $user = Auth::user();
        if($user->album->count() > 4)
        {
          Storage::delete("uploads/photos/id{$user->id}/" . $user->album->first()->image);
          $user->album->first()->delete();
        }
    }

    # получаем фото из альбома
    public function getPhoto($id)
    {

        if ( $this->image == null)
        {
            return;
        }
        return "/uploads/photos/id{$id}/" . $this->image;
    }



}
