@extends('layouts.app')

@section('content')

@include('layouts.modals')
@include('profile.modal')
<div class="container">
<div class="row mt-3">
    <div id="main-avatar" class=" col-md-4 ">
    <div class=" gallery">
        <a href="{{$user->getAvatar()}}">
            <img src="{{$user->getAvatar()}}" alt="{{$user->name}}" class="img-thumbnail rounded w-100 avatar-image"></a>
        <div class="text-center">
            @if(Auth::user()->id == $user->id)
            <button type="button" class="btn mt-4 btn-edit"
                    onclick="location.href='{{route('edit.profile', $user->id)}}'">
                <span>Редактировать</span></button>
                @else
                <button type="submit" class="btn mt-4 btn-send"
                        data-toggle="modal" data-target="#exampleModal">
                    <span>сообщение</span></button>
            @endif
        </div>
    </div>
    </div>
        <!-- /.col-lg-4 -->
    <div class="col-md-7 offset-md-1 ">
        <div class="main-name">
        <h3>{{$user->name}}
                <span class="is-online ">
                @if($user->isOnline())
                        <span class=""><i class="fas fa-circle circle-green mr-1"></i> В сети</span>
                    @else
                        <span><i class="fas fa-circle circle-gray mr-1"></i> Не в сети</span>
                    @endif
            </span>
            </h3>
            <p>{{$user->status}}
                @if (Auth::user()->id === $user->id)
                &ensp; &ensp; <a href="" data-toggle="modal" data-target="#exampleModal2">ред</a>
                @endif</p>
        </div>
        <section class="section-information ">
            <div class="main-table">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th scope="row">Возраст</th>
                        <td>{{$user->age}}</td>
                    </tr>
                    @if ($user->city)
                        <tr>
                            <th scope="row">Город</th>
                            <td>{{$user->city}}</td>
                        </tr>
                    @else
                    @endif
                    @if ($user->country)
                        <tr>
                            <th scope="row">Страна</th>
                            <td>{{$user->country}}</td>
                        </tr>
                    @else
                    @endif
                    <tr>
                        <th scope="row">Пол:</th>
                        <td>{{$user->getGender()}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.main-table -->
        </section>
        <!-- /.section-information -->
        <div class="about-me">
            <h3>Обо мне</h3>
            <p>{{$user->about_me}}</p>
        </div>
        <hr>
        <section class="section-photo ">
        <div class="my-photo gallery row">
                @if(empty($user->album->first()))
                <div class="col-sm-3 gallery-item ">
                    <a href="{{asset('default/1s.jpg')}}">
                        <img src="{{asset('default/1s.jpg')}}" class="rounded" alt=""></a>
                </div>
                <div class="col-sm-3 gallery-item ">
                    <a href="{{asset('default/2.jpg')}}">
                        <img src="{{asset('default/2.jpg')}}" class="rounded" alt=""></a>
                </div>
                <div class="col-sm-3 gallery-item ">
                    <a href="{{asset('default/3.jpg')}}">
                        <img src="{{asset('default/3.jpg')}}" class="rounded" alt=""></a>
                </div>
                <div class="col-sm-3 gallery-item ">
                    <a href="{{asset('default/4.jpg')}}">
                        <img src="{{asset('default/4.jpg')}}" class="rounded" alt=""></a>
                </div>
                @else
                @foreach($user->album as $photo)
                    <div class="col-sm-3 gallery-item ">
                        <a href="{{$photo->getPhoto($user->id)}}">
                            <img src="{{$photo->getPhoto($user->id)}}" class="rounded" alt=""></a>
                    </div>
                @endforeach
                @endif
        </div>
            @if(empty($user->posts->first()))
                <div class="text-center">
                    <h3 class="mt-3">Вы еще не опубликовали ни одного поста</h3>
                </div>
            @endif
                {!! Form::open(['route' => 'store.post', 'files'=> true, 'method' => 'post']) !!}
                <div class="form-post">
                    <form>
                        <div class="form-group mt-4 mr-4">
                            <textarea placeholder="Название Поста" name="title" class="form-control"  id="description" rows="1"></textarea>

                            <textarea placeholder="Что у вас нового?" name="description" class="form-control mt-3"  id="description" rows="4"></textarea>
                            <input name="image" type="file" class="form-control-file mt-1" id="image">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary mt-3 pull-right">Опубликовать</button>
                            </div>
                        </div>
                    </form>
                </div>

            {!! Form::close() !!}
                            <!-- /.col-sm-4 gallery-item -->
            <!-- /.my-photo gallery -->
</section>

    </div>
    <!-- /.col-lg-7 -->
<section class="section-blog">

    @foreach($user->posts->sortDesc() as $post)
        <div class="row no-gutters bg-light position-relative mt-3 main-post gallery">
            <div class="col-md-6 mb-md-0 p-md-4 text-center">
                @if(empty($post->getPostPhoto($user->id)) )
                @else
                    <a href="{{$post->getPostPhoto($user->id)}}"><img src="{{$post->getPostPhoto($user->id)}}" class="w-75" alt="..."></a>
                @endif
            </div>
            <div class="col-md-6 position-static p-4 pl-md-0 first-image">
                <div class="text-center">
                    <h5 class="mt-0">{{$post->title}}</h5>
                </div>
                <p class="mt-4">{{$post->description}} </p>
                <a href=""><span> <h4> <strong>{{$user->name}}</strong>  </h4>{{$post->created_at->diffForHumans()}}</span></a>
                <div class="edit-buttons text-right">
                        <a href="{{route('edit.post', [$post->id])}}" class="">Редактировать</a>

                        {!! Form::open(['route' => ['destroy.post', $post->id], 'method' => 'delete']) !!}

                        <button   onclick="return confirm('Точно удалить?')" class="delete-post mt-2">Удалить</button>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
    </section>
</div>
</div>
@endsection
