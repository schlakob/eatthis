@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3>Your Recipes</h3></div>
                <div class="card-body">
                    <a href="/recipes/create" class="btn btn-primary btn-block mb-3">Create new recipe</a>
                    @if (count($recipes) > 0)
                    <table class="table table-striped">
                        @foreach ($recipes as $recipe)
                            <tr class="row">
                                <td class="col-6 pt-4 text-truncate"><a href="/recipes/{{$recipe->id}}" class="text-primary font-weight-bold">{{$recipe->title}}</a></td>
                                <td class="col-3"><a href="/recipes/{{$recipe->id}}/edit" class="btn btn-secondary btn-block">Edit the Recipe</a></td>
                                <td class="col-3">
                                    {!! Form::open(['action' => ['RecipeController@destroy', $recipe->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                                    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <p>You have no recipes yet</p>
                    @endif
                    </table>
                    <a href="/recipes/create" class="btn btn-primary btn-block mt-3">Create new recipe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
