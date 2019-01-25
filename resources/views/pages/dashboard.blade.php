@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Recipes</div>

                <div class="card-body">
                    <a href="/recipes/create" class="btn btn-primary mb-2">Create</a>
                    @if (count($recipes) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($recipes as $recipe)
                            <td>{{$recipe->title}}</td>
                            <td><a href="/recipes/{{$recipe->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td>{!! Form::open(['action' => ['RecipeController@destroy', $recipe->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}</td>
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
