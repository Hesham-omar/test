@extends('layouts.master')

@section('content')
    <h2>Customers</h2>
        <a href="/customers/create">Create New customer </a>
    @if( count($users) )
        <table class="table table-light">
            <tr class="alert-dark">

                @php
                    $userfillable=$users[0]->getFillable();
                    $customerfillable=$users[0]->customer->getFillable();
                @endphp

                @foreach( $userfillable as $attribute  )
                    <th>{{ $attribute }}</th>
                @endforeach

                @foreach( $customerfillable as $attribute  )
                    <th>{{ $attribute }}</th>
                @endforeach
                <th>block</th>
                <th>deposit</th>
            </tr>
            @php
                $i=0;
                $userfillable=array_fill_keys($userfillable,'');
                $customerfillable=array_fill_keys($customerfillable,'');
               // dd($userfillable,$customerfillable);
            @endphp

            @foreach( $users as $item )

                <tr class="alert-info">
                    @php
                        if($item->customer->block)
                            $block='unblock';
                        else
                            $block='block';
                    @endphp

                    @foreach( array_intersect_key(  $item->toArray(),$userfillable ) as $attribute  )
                        <th>{{ $attribute }}</th>
                    @endforeach

                        @foreach( array_intersect_key( $item->customer->toArray() ,  $customerfillable) as $attribute  )
                        <th>{{ $attribute }}</th>
                    @endforeach

                    <td > <a href="/customers/block/{{$item->id}}" class="btn btn-danger">{{ $block }}</a> </td>
                    <td> <button  class="btn btn-success" onclick="myfunction({{$i}})" style="width:80px;"> Deposit </button>

                        <div class="form-group" id="deposit{{$i}}" style="display: none;">

                            <form method="post" action="/customers/deposit/{{$item->id}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="number" id="money{{$i}}" name="money" style="width: 60px;font-size: 13px;">
                                    <input type="submit" class="alert-success">
                                </div>
                            </form>

                        </div>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach

        </table>

    @else
        <h3> no items to show yet. </h3>
    @endif

    <script>
        function myfunction(i) {

            var myDepositDiv = document.getElementById('deposit'+i);
            var mymoneybox = document.getElementById('money'+i);

            if( myDepositDiv.style.display=='none')
                myDepositDiv.style.display='inline';
            else {
                myDepositDiv.style.display='none';
                mymoneybox.value='';
            }

        }
    </script>
@endsection