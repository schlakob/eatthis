@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold mb-2">Edit the recipe</h1>
    <hr>
    <input type="hidden" id="allIngredients-edit" value="{{$recipe->ingredients}}" readonly>
    {!! Form::open(['action' => ['RecipeController@update', $recipe->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', $recipe->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group mb-3">
                <span class="switch switch-sm">
                    {{Form::checkbox('private', '', $recipe->private, ['type' => 'checkbox', 'class' => 'switch', 'id' => 'switch-sm'])}}
                    {{Form::label('switch-sm', 'Private')}}
                </span>
            </div>
        <div class="form-group">
                {{Form::label('ingredients', 'Ingredients (please type in the quantity for 1 person):')}}
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
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'createButton'])}}
        <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
    {!! Form::close() !!}
@endsection
