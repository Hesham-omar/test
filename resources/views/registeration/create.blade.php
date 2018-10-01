@extends('layouts.master')

@section('content')

    <h1>Register</h1>

    <hr>

    <form method="post" action="/register">
        
        {{csrf_field()}}
        

            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>

        

            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>



            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

        

            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype Password" required>



            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required>



            <input type="number" class="form-control" id="balance" name="balance" placeholder="Balance" required>


        <div class="form-group">
            block <input type="checkbox"  id="block" name="block"  value="1">

        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" id="submit" name="register" value="Register">
        </div>
        
        
    </form>
@endsection