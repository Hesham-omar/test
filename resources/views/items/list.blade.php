@extends('layouts.master')

@section('content')
    <h2>Items</h2>
    @if(auth()->check() )
        @if(!auth()->user()->type)
            <a href="/items/create">Create New Item </a>
        @else
            <form method="POST" action="/order">
                {{csrf_field()}}
        @endif
    @endif

    @if( count($items) )
        <table class="table table-light">
            <tr class="alert-dark">
                <th>Name</th>
                <th>Price</th>
                <th>type</th>
                <th>Created at</th>

                @if( auth()->check() )
                    @if(!auth()->user()->type)
                        <th>Delete</th>
                        <th>Edit</th>
                    @else
                        <th> Add to cart</th>
                    @endif
                @endif
            </tr>
            @php
                $i=0
            @endphp
            @foreach( $items as $item )

                <tr class="alert-info">
                    <td>{{$item->name}}</td>
                    <td>{{ $item->price  }}</td>
                    <td>{{ $item->category->name  }}</td>

                    <td><label  style='font-weight: lighter;font-size: small' >{{$item->created_at->toFormattedDateString()}}</label></td>
                    @if(auth()->check() )
                        @if(!auth()->user()->type)
                            <td><a href="/items/delete/{{$item->id}}">delete </a></td>
                            <td><a href="/items/edit/{{$item->id}}">Edit </a></td>
                        @else
                            <td> <div class="form-group">
                                <input type="checkbox" id="{{$i}}" value="{{$item->id}}" name="items[]" onclick="myfunction({{$i}})">
                                 <input type="number" name="amount[]" id="amount{{$i}}" style="display: none;width: 60px;height: 20px">
                                </div>
                            </td>
                        @endif
                    @endif
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach

        </table>
                @if(auth()->check() )
                    @if(auth()->user()->type)
                            <div class="form-group">
                             <input class="btn btn-primary" type="submit" value="submit" name="order" style="width: 100%"/>
                            </div>
                        </form>
                    @endif
                @endif
            @else
                <h3> no items to show yet. </h3>
    @endif
<script>
    function myfunction(i) {

        var myTextField = document.getElementById('amount'+i);
        var mycheckbox = document.getElementById(i);

        if(mycheckbox.checked==true)
            myTextField.style.display='inline';
        else
            myTextField.style.display='none';
    }
</script>
@endsection