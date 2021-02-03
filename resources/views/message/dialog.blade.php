@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-7 mx-auto ">
        <div class="overflow-auto">


            @foreach($messages as $message)
                <div class="card mt-2 ">
                    {{--                @dd($message->id)--}}
                    <div class="card-body ">
                        @if($message->sender->id === Auth::user()->id)

                            <a href="{{route('show.profile', Auth::user()->id)}}">
                                <img src="{{$message->sender->getAvatar()}}"
                                     class="img-thumbnail float-left" style="border-radius: 50%; max-width: 130px" alt="..."></a>
                        @else
                            <a href="{{route('show.profile', $message->sender->id)}}">
                                <img src="{{$message->sender->getAvatar()}}"
                                     class="img-thumbnail float-left" style="border-radius: 50%; max-width: 130px" alt="..."></a>
                        @endif
                        <h5 class="mt-0">{{$message->sender->name}}</h5>
                        <h4 class="ml-4 "> <strong>{{$message->body}}</strong>  </h4>
                        @if(empty($message->getImage()))
                        @else
                            <p class="ml-4">
                                <a href="{{$message->getImage()}}" class="gallery"><img src="{{$message->getImage()}}" class="img-thumbnail w-50" alt=""></a>
                            </p>
                        @endif
                        <p class="ml-4">{{$message->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            @endforeach
        </div>

            <hr>
                    <!-- /.dialog -->

            {{--    Отправить сообщениe--}}

            {!! Form::open(['route' => ['dialog.store', $message->receiver->id ], 'files' => true, 'method' => 'post']) !!}

            <div class="col-md-12">
                <form >
                    <div class="form-group mt-4">
                        <textarea placeholder="Отправьте сообщение" name="body" class="form-control" id="body" rows="4"></textarea>
                        <input name="image" type="file" class="form-control-file mt-1" id="image">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary  pull-right">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>

            {!! Form::close() !!}

        </div>

        </div>







@endsection
