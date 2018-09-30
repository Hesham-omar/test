@extends('layouts.master')

@section('content')

    <h1>Login</h1>
    <hr>
    <form method="post" action="/login">
        
        {{csrf_field()}}
        
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="email" placeholder="username">
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
        
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" id="submit" name="login" value='Login'>
        </div>
        
        
    </form>
@endsection