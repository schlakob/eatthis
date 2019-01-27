@extends('layouts.app')

@section('content')
    <h1>Copy the Recipe</h1>
    {!! Form::open(['action' => 'RecipeController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', $recipe->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('ingredients', 'Ingredients:')}}
                <table id="ingredients-table">
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
                {{Form::button('+' , ['id' => 'addButton', 'class' => 'btn btn-primary'])}}
                {{Form::hidden('ingredients', '', ['class' => 'form-control', 'id' => 'json-ing'])}}
        </div>
        <div class="form-group">
                {{Form::label('description', 'Description:')}}
                {{Form::textarea('description', $recipe->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'createButton'])}}
    {!! Form::close() !!}
    @include('inc/ingredients')
    @include('inc/unitSelect')
    @include('inc/loadIngredients')
@endsection
