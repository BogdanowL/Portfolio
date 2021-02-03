

{!! Form::open(['route' => 'sendTelegram', 'method' => 'post']) !!}

<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel5">Написать <strong>Леониду Богданову</strong>. Ваше сообщение будет доставлено в мой телеграм</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><strong>Тема или ваше имя:</strong>(не обязательно) </label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><strong>Сообщение:</strong></label>
                        <textarea class="form-control" name="message" id="message-text" rows="8"></textarea>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
