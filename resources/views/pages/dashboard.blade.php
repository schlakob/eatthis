@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3>Your Recipes</h3></div>

                <div class="card-body">
                    <a href="/recipes/create" class="btn btn-primary btn-block mb-2">Create new recipe</a>
                    @if (count($recipes) > 0)
                    <table class="table table-striped">
                        <tr class="row">
                            <th class="col-6">Title</th>
                            <th class="col-3"></th>
                            <th class="col-3"></th>
                        </tr>
                        @foreach ($recipes as $recipe)
                            <tr class="row">
                                <td class="col-6 pt-4"><a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a></td>
                                <td class="col-3"><a href="/recipes/{{$recipe->id}}/edit" class="btn btn-secondary btn-block">Edit the Recipe</a></td>
                                <td class="col-3">{!! Form::open(['action' => ['RecipeController@destroy', $recipe->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                                    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <p>You have no recipes yet</p>
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
