@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-6">
            <a href="/dashboard" class="btn btn-primary btn-block">go to your dashboard</a>
        </div>
        <div class="col-6">
            <a href="/recipes" class="btn btn-primary btn-block">go to all recipes</a>
        </div>
    </div>
    <h1>{{$recipe->title}}</h1>

    <p>{{$recipe->ingredients}}</p>
    <hr>
    <p>{{$recipe->description}}</p>
    <hr>
    <small>Last update on: <span class="text-primary">{{$recipe->created_at}}</span> by <span class="text-primary">{{$recipe->user->name}}</span></small>
    <hr>
    <div class="row">
    @if (!Auth::guest())
         @if (Auth::user()->id == $recipe->user_id)
            <div class="col-6">
                <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-secondary btn-block">Edit</a>
            </div>

            <div class="col-6">
            {!! Form::open(['action' => ['RecipeController@destroy', $recipe->id], 'method' => 'POST', 'class' => '']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block '])}}
            {!! Form::close() !!}</div>
        @endif
    @endif
    </div>

@endsection
