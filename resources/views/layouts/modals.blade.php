
{{--   модальное окно изменения статуса--}}
{!! Form::open(['route' => 'change.status', 'method' => 'post' ]) !!}

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal1Label2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label2">Изменить статус:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input name="status" value="{{$user->status}}" type="text" class="form-control" id="recipient-name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Сохранить</button>

                </form>

            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}


