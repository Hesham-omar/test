@if(count($errors))
    <div class="alert alert-danger col-sm-4 form-control form-group " style="padding-bottom: 20px;padding-top: 20px;margin-top: 20px;margin-left: 450px;">

        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif
