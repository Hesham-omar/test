@extends('layouts.master')

@section('content')

    <h1>Register</h1>

    <hr>

    <form method="post" action="/register">
        
        {{csrf_field()}}
        
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype Password" required>
        </div>
        
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" id="submit" name="register" value="Register">
        </div>
        
        
    </form>
@endsection