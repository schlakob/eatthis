@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-6">
            <a href="/dashboard" class="btn btn-primary btn-block">go to your dashboard</a>
        </div>
        <div class="col-6">
            <a href="/recipes" class="btn btn-primary btn-block">go to all recipes</a>
        </div>
    </div>
    <h1>{{$recipe->title}}</h1>
    <hr>
    <input type="hidden" id="allIngredients" value="{{$recipe->ingredients}}" readonly>
    <div class="row">
        <div class="col-7">
            <div class="card ">
                <div class="card-header text-center"><h4>Ingredients</h4></div>
                <div class="card-body">
                    <table id="ingredients-table" class="table table-striped">
                        <tr></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-5">
                <div class="card ">
                    <div class="card-header text-center"><h4>Calculator</h4></div>
                    <div class="card-body text-center">
                        <p>Here you can calculate the portions for a specific amount of people, but is not functional right now (coming soon):</p>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary col-2 mr-3">+</button>
                            <input type="number" class="form-control col-2" value="1">
                            <button class="btn btn-danger col-2 ml-3">-</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
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

        @else
            <div class="col-12">
                <a href="/recipes/copy/{{$recipe->id}}" class="btn btn-secondary btn-block">Copy to your recipes</a>
            </div>
        @endif
    @endif
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $array = JSON.parse($('#allIngredients').val());
            for (let i = 0; i < $array.length; i++) {
                const element = $array[i];
                $('#ingredients-table tr:last').after('<tr>' +
                '<td>'+element['amount']+'</td>' +
                '<td>'+element['unit']+'</td>' +
                '<td>'+element['ingredient']+'</td>' +
                '</tr>');
            }
        });
    </script>
@endsection
