{!! Form::open(['route' => ['dialog.store',$user->id],
               'files' => true, 'method' => 'post']) !!}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if(empty(Auth::user()))
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Чтобы написать <strong>{{$user->name}}</strong> вам необходимо зарегестрироваться на сайте! </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @else
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Написать <strong>{{$user->name}}</strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Сообщение:</label>
                        <textarea name="body" class="form-control" id="message-text" rows="6"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

                <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
{!! Form::close() !!}
