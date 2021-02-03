<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


trait HelpTrait
{
    # Получаем путь для сохранения изображений
    public function getPathToSaveImage($folder)
    {
        $user = Auth::user();
        if ($folder == 'dialogs')
        {
            return "/uploads/dialogs/";
        }
        $path = "uploads/{$folder}/id{$user->id}";
        if ( ! file_exists("{$path}"))
        {
            mkdir("{$path}", 0777, true);
        }
        return "/{$path}/";
    }

    # загружаем фотографию поста, получаем картинку и
    # $folder - папки для сохранения различных сущностей
    public function uploadImage($image, $folder)
    {

        if ($image == null) { return;}
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs($this->getPathToSaveImage($folder), $filename );
        $this->image = $filename;
        # здесь проверяем, если связанные модели, то записываем,
        # если юзер загружает аватарку, то пропускаем
        if ($folder == 'dialogs')
        {
            $this->save();
            return;
        }
        if ($folder != 'avatars')
        {
            $this->user_id = Auth::user()->id;
        }
        $this->save();

    }

    # здесь обновляем любую информацию в БД
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    # загружаем модели с image = NULL
    public function scopeNull($query, $value)
    {
        return $query->whereNull($value);
    }


    public function resize($image, $folder)
    {
        Image::make($image)->resize(600, 600)
            ->save( public_path( $this->getPathToSaveImage($folder) ) . $filename );

    }
}
