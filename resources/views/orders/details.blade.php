@extends('layouts.master')  

@section('content')
        
        <h1>{{$task->title}} </h1>
        <h3>{{ $task->user->name }}</h3>

            @if( count( $task->tags ) )
                <ul>
                    @foreach($task->tags as $tag)
                        <li>
                            <a href="/tasks/tags/{{ $tag->name }}">
                                {{$tag->name}}
                            </a>
                        </li>
                     @endforeach
                </ul>
             @endif

        {{$task->body}}
        <p>
            @if($task->completed)
                {{'completed'}}
            @else
                {{'Not Yet'}}
            @endif
        </p>
        <hr>
        @foreach($task->comments as $comment)
        <div class="form-control form-group">
            <strong>{{$comment->created_at->diffForHumans()   }}: &nbsp; </strong>
            {{$comment->body}}
        </div>
        @endforeach

        
        <form method="post" action="/tasks/{{$task->id}}/comments">
            {{csrf_field()}}
            <textarea class="form-control form-group" name="body" placeholder="write your comment." required></textarea>
                <input class="btn btn-primary " type="submit" />
        </form>
        
        

@include('layouts.errors')
@endsection