@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h3 class="d-block text-center mt-3"> <strong>Диалоги:</strong> </h3>
            @foreach($messages as $message)
            <div class="card mt-3">
                <div class="card-body ">
                @if($message->dialogSender->id == Auth::user()->id)
                        <a href="{{route('dialog.show', $message->id)}}">   <img src="{{$message->dialogResponder->getAvatar()}}" class=" img-thumbnail float-left " style="border-radius: 50%; max-width: 130px" alt="..."></a>
                        <a href="{{route('dialog.show', $message->id)}}" class="message-avatar"><h5 class="card-title "> <strong>{{$message->dialogResponder->name}}</strong> </h5></a>
                        <a href="{{route('dialog.show', $message->id)}}" class="message-avatar">  <p class="card-text ">{{\App\Message::where('dialog', $message->id)->get()->last()->body}} </p> </a>
                         <div class="card-footer text-muted "> {{\App\Message::where('dialog', $message->id)->get()->last()->created_at->diffForHumans()}} </div>
                    @else
                        <a href="{{route('dialog.show', $message->id)}}"><img src="{{$message->dialogSender->getAvatar()}}" class=" img-thumbnail float-left " style="border-radius: 50%; max-width: 130px" alt="..."></a>
                        <a href="{{route('dialog.show', $message->id)}}" class="message-avatar"><h5 class="card-title "> <strong>{{$message->dialogSender->name}}</strong> </h5></a>
                        <a href="{{route('dialog.show', $message->id)}}" class="message-avatar">  <p class="card-text ">{{\App\Message::where('dialog', $message->id)->get()->last()->body}}</p> </a>
                        <div class="card-footer text-muted "> {{\App\Message::where('dialog', $message->id)->get()->last()->created_at->diffForHumans()}} </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
