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
            <table id="ingredients-table">
                <tbody>
                    <tr>
                        <td>
                            {{Form::text('amount', '', ['class' => 'form-control', 'placeholder' => 'Amount'])}}
                        </td>
                        <td>
                            {!!Form::select('unit', ['g' => 'g', 'ml' => 'ml', 'l' => 'l'], null ,  ['class' => 'form-control'])!!}
                        </td>
                        <td>
                            {{Form::text('ingredient', '', ['class' => 'form-control', 'placeholder' => 'Ingredient'])}}
                        </td>
                    </tr>
                </tbody>
            </table>
            {{Form::button('+' , ['id' => 'addButton', 'class' => 'btn btn-primary'])}}
            {{Form::hidden('ingredients', '', ['class' => 'form-control', 'id' => 'json-ing'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description:')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::submit('Create', ['class' => 'btn btn-primary', 'id' => 'createButton'])}}
    {!! Form::close() !!}
@endsection
