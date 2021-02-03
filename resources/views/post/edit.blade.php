@extends('layouts.app')

@section('content')
    <div class="row ">
    <div class="col-lg-6 mx-auto">

        <h4>Редактировать пост</h4>

        <div class="media mt-4">
            <div class="media-body">
                <h5 class="mt-0">{{$user->name}}</h5>
                {!! Form::open(['route' => ['update.post', ['id' => $post->id]], 'method' => 'POST']) !!}
                <form>
                    <div class="form-group">
                        <label for="">Название поста</label>
                        <input name="title" type="text" class="form-control"
                                value="{{$post->title}} " >
                        <textarea name="description" id="description" cols="80" class="form-control mt-4" rows="10">{{$post->description}}</textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
                {!! Form::close() !!}
                <div class="text-center mt-4">
                    <img src="{{$post->getPostPhoto($user->id)}}" class="post-image w-50" alt="">
                </div>
                <p>{{$post->created_at->diffForHumans()}}</p>
                <div class="text-right mt-3">
                </div>
            </div>
</div>
</div>
@endsection


