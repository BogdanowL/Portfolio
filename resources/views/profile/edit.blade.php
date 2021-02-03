@extends('layouts.app')

@section('content')
<div class="container">
<div class="row ">
        <div class="col-lg-6 text-center">

            {{--    Загружаем аватар--}}
            <h5>Аватарка</h5>
            <hr>
            <div><img src="{{$user->getAvatar()}}" alt="" class=" img-thumbnail rounded w-50 "></div>
            {!! Form::open(['route' => 'upload.avatar', 'method' => 'POST',
           'files' => true]) !!}
            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Выберите новую аватарку</label>
                    <input type="file" class="form-control-file" name="avatar"
                           id="avatar">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Обновить Альбом</button>
            </form>
            {!! Form::close() !!}

            <br>

            {{--    Загружаем фото в альбом--}}
            <hr class="mt-3">
            <h5>Ваши фото</h5>

            {{-- !!!!!!!!!!   Потом убрать !!!!!!!!!!!!!!!--}}
            @if ( $user->album()->first() != null )
                    <div class="row">
                        @foreach($user->album as $photo)

                        <img src="{{$photo->getPhoto($user->id)}}" alt="" class=" img-thumbnail rounded w-25 ">
                        @endforeach

                    </div>
            @else
            @endif
            {!! Form::open(['route' => 'store.image', 'method' => 'POST',
           'files' => true]) !!}
            <form>
                <div class="form-group ">
                    <label for="exampleFormControlFile1">Выберите новые фотографии</label>
                    <input type="file" class="form-control-file" name="photo"
                           id="photo">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Обновить альбом</button>
            </form>
            {!! Form::close() !!}

        </div>
{{--        <div class="col-lg-2"></div>--}}
        <div class="col-lg-6 ">

            <form action="{{route('update.profile', $user->id)}}" method="POST">
                @csrf
                <div>
                    <div class="col-lg-8">
                        <label for="">Укажите имя</label>
                        <input name="name" type="text" class="form-control"
                               placeholder="{{$user->name}}" value="{{$user->name}} " >
                    </div>
                    <div class="col-lg-8 mt-3">
                        <label for="">Ваша страна</label>
                        <input name="country" type="text" class="form-control"
                               placeholder="{{$user->country}}" value=" {{$user->country}}">
                    </div>
                </div>
                <div class="col-lg-8 mt-3">
                    <label for="">Ваш город</label>
                    <input name="city" type="text" class="form-control"
                           placeholder="{{$user->city}}" value=" {{$user->city}} ">
                </div>
                <div class="col-lg-8 mt-3">
                    <label for="">Ваш возраст</label>
                    <input name="age" type="text" class="form-control"
                           placeholder="{{$user->age}}" value="{{$user->age}} ">
                </div>
                <div class="form-group ml-2 mt-3">
                    <label for="about_me">Обо мне:</label>
                    <textarea name="about_me" class="form-control" id="about_me" rows="5"
                    > {{$user->about_me}} </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Обновить профиль</button>
            </form>
        </div>
    </div>

</div>



@endsection



