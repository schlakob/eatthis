@extends('layouts.app')

@section('content')
    <h1>Edit the Recipe</h1>
    {!! Form::open(['action' => ['RecipeController@update', $recipe->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', $recipe->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('ingredients', 'Ingredients:')}}
                {{Form::textarea('ingredients', $recipe->ingredients, ['class' => 'form-control', 'placeholder' => 'Ingredients'])}}
        </div>
        <div class="form-group">
                {{Form::label('description', 'Description:')}}
                {{Form::textarea('description', $recipe->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection