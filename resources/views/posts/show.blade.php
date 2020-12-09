@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>

    <h1>{{$post->title}}</h1>

    <div>
        {!!$post->body!!}
    </div>
    <hr>

    <small>Written on {{$post->created_at}} by {{$post->user->name}}.</small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <div class="d-flex flex-row bd-highlight mb-3">

                <div class="p-2 bd-highlight">
                    <a href="/posts/{{$post->id}}/edit/" class="btn btn-success">Edit</a>
                </div>

                <div class="p-2 bd-highlight">
                    {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        @endif
    @endif

@endsection
