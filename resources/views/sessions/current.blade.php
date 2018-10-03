@extends('layouts.master')  

@section('content')
        
        <h1 class="form-group"> {{$user->name}} </h1>

        <div class="form-group">
            <div class="form-control">
                <label> Balance :  </label>
                {{$user->customer->balance}}
            </div>
        </div>

        <div class="form-group">
            <div class="form-control">
                <label> Blocked :  </label>
                {{$user->customer->block}}
            </div>
        </div>

        <div class="form-group">
            <div class="form-control">
                <label> Email :  </label>
                {{$user->email}}
            </div>
        </div>

        <div class="form-group">
            <div class="form-control">
                <label> password : </label>
                {{$user->password}}
            </div>
        </div>

        <div class="form-group">
            <div class="form-control">
                <label> Phone : </label>
                {{$user->phone}}
            </div>
        </div>

@include('layouts.errors')
@endsection