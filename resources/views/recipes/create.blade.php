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
                            {!!Form::select('unit', ['g' => 'gramms', 'ml' => 'ml', 'l' => 'liter'], null ,  ['class' => 'form-control', 'placeholder' => 'Unit'])!!}
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#addButton').click(function(){
                $('#ingredients-table tr:last').after('<tr>' +
                '<td>{{Form::text('amount', '', ['class' => 'form-control', 'placeholder' => 'Amount'])}}</td>' +
                '<td>{!!Form::select('unit', ['g' => 'gramms', 'ml' => 'ml', 'l' => 'liter'], null ,  ['class' => 'form-control', 'placeholder' => 'Unit'])!!}</td>' +
                '<td>{{Form::text('ingredient', '', ['class' => 'form-control', 'placeholder' => 'Ingredient'])}}</td>' +
                '</tr>');
            });
            $('#createButton').click(function(){
                $counter = 0;
                $allIngredients = $("#ingredients-table :input" ).serializeArray();
                $result = [];
                for (let i = 0; i < $allIngredients.length; i=i+3) {
                    const amount = $allIngredients[i].value;
                    const unit = $allIngredients[i+1].value;
                    const ingredient = $allIngredients[i+2].value;
                    $result.push({
                        "amount" : amount,
                        "unit" : unit,
                        "ingredient"  : ingredient
                    });
                }
                alert(JSON.stringify($result));
                $('#json-ing').val(JSON.stringify($result));
            });
        });

    </script>
@endsection
