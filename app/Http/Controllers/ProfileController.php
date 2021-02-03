<?php

namespace App\Http\Controllers;

use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    #Получаем профиль зрегестрированного пользователя
    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('profile.index', compact('user'));
    }


    # загружаем аватар пользователя
    public function uploadUserAvatar(Request $request)
    {
        Auth::user()->uploadAvatar($request->file('avatar'));
        return redirect()->back();
    }

    # здесь обновляем статус
    public function changeStatus(Request $request)
    {
        Auth::user()->edit($request->all());
        return redirect()->back();
    }

    # получаем профили пользователей
    public function show($id)
    {
        $user = User::with(['album', 'posts'])->find($id);
        if (!empty(Auth::user()->id) and Auth::user()->id == $user->id)
        {
            return redirect()->route('profile');
        }

        return view('profile.profile',compact('user'));
    }

    # получаем данные пользователя
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit', compact('user'));
    }

    # здесь обновляем информацию о пользователе
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->edit($request->all());
        return redirect()->route('edit.profile', $user->id)->with('info', 'Профиль успешно обновлен!');
    }

    #Здесь редиректим не авторизованных пользователей
    public function checkAuth()
    {
        return view('layouts.checkAuth');
    }

}
