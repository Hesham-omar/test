@extends('layouts.master')

@section('content')
    <h2>Items</h2>
    @if(auth()->check())
        <a href="/items/create">Create New Item </a>
    @endif

    @if( count($items) )
        <table class="table table-light">
            <tr class="alert-dark">
                <th>Name</th>
                <th>Price</th>
                <th>type</th>
                <th>Created at</th>
                @if(auth()->check())
                    <th>Delete</th>
                    <th>Edit</th>
                @endif
            </tr>
            @foreach( $items as $item )
                <tr class="alert-info">
                    <td>{{$item->name}}</td>
                    <td>{{ $item->price  }}</td>
                    <td>{{ $item->category->name  }}</td>

                    <td><label  style='font-weight: lighter;font-size: small' >{{$item->created_at->toFormattedDateString()}}</label></td>
                    @if(auth()->check())
                        <td><a href="/items/delete/{{$item->id}}">delete </a></td>
                        <td><a href="/items/edit/{{$item->id}}">Edit </a></td>
                    @endif
                </tr>

            @endforeach
        </table>
            @else
                <h3> no items to show yet. </h3>
    @endif

@endsection