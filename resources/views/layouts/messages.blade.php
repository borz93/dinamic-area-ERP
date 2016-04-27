@if(session('valid') || session('invalid'))
    <div class="alert alert-info" role="alert">
        <ul class="list-unstyled">
            <li>{{session('valid') }}</li>
            <li>{{session('invalid') }}</li>
        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif