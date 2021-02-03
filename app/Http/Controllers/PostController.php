<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{


    # создаем пост на стене и сохраняем картинку
    public function store(Request $request)
    {
          $post =  Auth::user()->posts()->create([
              'description' => $request->description,
              'title' => $request->title
              ]);
          $post->uploadImage($request->file('image'), 'posts');
          return redirect()->back();
    }

    # здесь получаем пост для редактирования
    public function edit($id)
    {
        $post = Auth::user()->posts->find($id);
        $user = Auth::user();
        return view('post.edit', compact('post', 'user'));
    }

    # редактируем пост без изменения картинки
    public function updatePost(Request $request, $id)
    {
       $post = Auth::user()->posts()->find($id);
       $post->edit($request->all());
       return redirect()->route('show.profile', Auth::user()->id)->with('info', 'Пост обновлен!');
    }

    # здесь удаляем пост и картинку
    public function destroy($id)
    {
        Auth::user()->posts()->find($id)->removePost();
        return redirect()->back()->with('info', 'ваш пост удален!');
    }
}
