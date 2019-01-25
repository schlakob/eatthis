@extends('layouts.app')

@section('content')
    <h1>Create a new Recipe</h1>
    {!! Form::open(['action' => 'RecipeController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('ingredients', 'Ingredients:')}}
                {{Form::textarea('ingredients', '', ['class' => 'form-control', 'placeholder' => 'Ingredients'])}}
        </div>
        <div class="form-group">
                {{Form::label('description', 'Description:')}}
                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
