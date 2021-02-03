@extends('layouts.app')

@section('content')


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <div class="text-center">
                            <h3 class="mb-5">Чтобы редактировать свой профиль и оптравлять сообщения вам необходимо зарегестрироваться или авторизоваться</h3>
                        </div>
                        </h5>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
{{--                <div class="modal-body">--}}
{{--                    ...--}}
{{--                </div>--}}
                <div class="modal-footer text-center">

{{--                        <button type="button"  class="btn btn-success" data-dismiss="modal">Закрыть</button>--}}
                        <button type="button" onclick="location.href='{{route('login')}}'" class="btn btn-primary">Войти</button>
                        <button type="button" onclick="location.href='{{route('register')}}'" class="btn btn-primary">Регистрация</button>
                        <button type="button" onclick="location.href='/'" class="btn btn-primary">Главная страница</button>


                </div>
            </div>
        </div>
    </div>



@endsection
