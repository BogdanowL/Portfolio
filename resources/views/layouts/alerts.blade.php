@if(Session::has('info'))

    <div class="alert alert-primary text-center" role="alert">
        {{Session::get('info')}}
    </div>

@endif
