@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold mb-2">Copy the recipe</h1>
    <hr>
    {!! Form::open(['action' => 'RecipeController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', $recipe->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('ingredients', 'Ingredients (please typ in the quantity for 1 person):')}}
                <table id="ingredients-table">
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
                {{Form::button('+' , ['id' => 'addButton', 'class' => 'btn btn-primary col-7 mt-2'])}}
                {{Form::hidden('ingredients', '', ['class' => 'form-control', 'id' => 'json-ing'])}}
        </div>
        <div class="form-group">
                {{Form::label('description', 'Description:')}}
                {{Form::textarea('description', $recipe->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'createButton'])}}
    {!! Form::close() !!}
@endsection
