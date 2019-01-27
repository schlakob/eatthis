@extends('layouts.app')

@section('content')
    <h1>Edit the Recipe</h1>
    <input type="hidden" id="allIngredients" value="{{$recipe->ingredients}}" readonly>
    {!! Form::open(['action' => ['RecipeController@update', $recipe->id], 'method' => 'POST']) !!}
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
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'createButton'])}}
    {!! Form::close() !!}
    @include('inc/ingredients')
    @include('inc/unitSelect')
    @include('inc/loadIngredients')
@endsection
