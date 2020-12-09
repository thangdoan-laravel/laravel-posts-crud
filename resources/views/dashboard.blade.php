@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <a class="btn btn-primary" href="/posts/create">Create Post</a>
                    @if (count($posts)>0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col" colspan="2">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->id}}</th>
                                        <td>{{$post->title}}</td>
                                        <td><a class="btn btn-success" href="/posts/{{$post->id}}/edit">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You do not have any posts.</p>
                    @endif
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
