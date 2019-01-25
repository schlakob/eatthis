@extends('layouts.app')

@section('content')
    <a href="/recipes" class="btn btn-secondary">Back</a>
    <h1>{{$recipe->title}}</h1>
    <p>{{$recipe->ingredients}}</p>
    <hr>
    <p>{{$recipe->description}}</p>
    <hr>
    <small>Last update on: {{$recipe->created_at}} by {{$recipe->user->name}}</small>
    <hr>
    @if (!Auth::guest())
         @if (Auth::user()->id == $recipe->user_id)
            <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-primary">Edit</a>

            {!! Form::open(['action' => ['RecipeController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif


@endsection
