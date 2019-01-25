@extends('layouts.app')

@section('content')
    <h1>{{$recipe->title}}</h1>
    <p>{{$recipe->ingredients}}</p>
    <hr>
    <p>{{$recipe->description}}</p>
    <hr>
    <small>Last update on: {{$recipe->created_at}} by {{$recipe->user->name}}</small>
    <hr>
    <div class="row">
    @if (!Auth::guest())
         @if (Auth::user()->id == $recipe->user_id)
            <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-secondary btn-block col-6">Edit</a>
            <div class="col-6">
            {!! Form::open(['action' => ['RecipeController@destroy', $recipe->id], 'method' => 'POST', 'class' => '']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block '])}}
            {!! Form::close() !!}</div>
        @endif
    @endif
    </div>

@endsection
