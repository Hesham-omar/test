@extends('layouts.master')

@section('content')
    <h2>Orders History</h2>


    @if( count($orders) )
        <table class="table table-light">
            <tr class="alert-dark">

                <th>Created at</th>
                <th>item</th>
                <th>amount</th>

            </tr>

            @foreach( $orders as $order )
            <tr>
                <td><label  style='font-weight: lighter;font-size: small' >{{$order->created_at->toFormattedDateString()}}</label></td>
                <td>
                    <div class="form-group">
                        @foreach($order->items as $item)
                            <li>
                                {{$item->name }}
                            </li>
                         @endforeach
                    </div>
                </td>

                <td>
                    @foreach($order->items as $item)
                        <li>
                            {{$item->pivot->amount}}
                        </li>
                    @endforeach
                </td>

            </tr>
            @endforeach

        </table>

            @else
                <h3> no items to show yet. </h3>
    @endif

@endsection