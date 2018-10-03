@extends('layouts.master')  

@section('content')
        
        <h1 class="form-group"> {{$user->name}} </h1>
        @foreach(array_combine( array_keys($user->toArray()) , $user->toArray() ) as $attribute => $value )
            <div class="form-group">
                <div class="form-control">
                    <label> {{$attribute}} :  </label>
                    {{$value}}
                </div>
            </div>
        @endforeach
@include('layouts.errors')
@endsection