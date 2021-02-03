@extends('layouts.app')

@section('content')
<div class="home-header">
<div class="container-fluid">
    <div class="row justify-content-center">
@include('layouts.tgmodal')

    <div class="col-md-4  ">
    <div class="text-center mt-5 main-left ">
        <button class="btn btn-primary mt-5 btn-lg btn-me" data-toggle="modal" data-target="#exampleModal5" data-whatever="@mdo">Написать разработчику</button>
        <button class="btn btn-success btn-lg btn-create mt-5 " id="btn-reg" >Создать профиль</button>
        <button class="btn btn-primary btn-lg btn-random mt-5 " id="btn-rand" >Смотреть случайный профиль </button>
    </div>

    </div>
    <div class="col-md-6 ">
        <div class="text-center ">
            <a href="{{route('show.profile', 1)}}" target="_blank" style="text-decoration: none; color: white;"> <h3 class="header-description mb-5" >Леонид Богданов  </h3></a>
            <div class="about-me-main mt-5">
                <p >Вэб-разработчик. Это мой сайт-портфолио <br>
                    Здесь вы можете  создать свой профиль, обмениваться сообщениями,
                    оставлять комментарии, создавать посты и новости</p>
            </div>



        </div>

    </div>
    </div>

    <div class="col-md-10 mx-auto">
        <div class="text-center">
            <button class="btn btn-danger btn-lg mt-5 mb-3 btn-res" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Резюме</button>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body mt-4 ">
                <h3 class="">
                @include('layouts.resume')
                </h3>
            </div>
        </div>
    </div>

</div>
</div>
<hr>
<div class="home-main">
<div class="container-fluid">
    <div class="row">

<div class="col-md-8 mx-auto mt-2">
    <h4 class="d-block text-center mt-5"> <p class="site-desc">На сайте реализованы основные функции социальных сетей. Редактирование своего профиля, отправка личных сообщений, возможность вести свой блог на стене у себя в профиле и т.д.</p></h4>
    <div class="row justify-content-center" >
        @foreach($random as $user)
            <div class="card d-inline-block ml-4 mt-3" style="width: 18rem;">
                <img src="{{$user->getAvatar()}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text"> {{ Str::limit($user->about_me, 120) }}</p>
                    <div class="text-center">
                        <a href="{{route('show.profile', $user->id)}}" target="_blank" class="btn btn-primary">Смотреть профиль</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

<div class="col-md-8 mx-auto ">


    <div id="carouselExampleCaptions" class="carousel slide mt-5 mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="{{asset('image/post01.jpg')}}" class="gallery"><img src="{{asset('image/post01.jpg')}}" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="{{asset('image/post02.jpg')}}" class="gallery"><img src="{{asset('image/post02.jpg')}}" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item">
            <a href="{{asset('image/post03.jpg')}}" class="gallery"><img src="{{asset('image/post03.jpg')}}" class="d-block w-100" alt="..."></a>

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</div>

    </div>
</div>
</div>
<footer>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 footer-col" >

            <div class="main-footer text-center pt-5">
            <p> Леонид Богданов {{date ( 'Y' )}}</p>
            </div>
        </div>
    </div>
</div>
</footer>


@endsection
