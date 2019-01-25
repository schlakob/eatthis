@extends('layouts.app')

@section('content')
    <h1>Recipes</h1>
    <a href="/recipes/create" class="btn btn-primary mb-2">Create</a>

    @if (count($recipes) > 0)
        @foreach ($recipes as $recipe)
        <div class="card mb-2">
            <div class="card-body">
            <h3 class="card-title"><a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a></h3>
                <p class="card-test">{{$recipe->description}}</p>
                <small>Written on: {{$recipe->created_at}}</small>
            </div>
        </div>
        {{$recipes->links()}}
        @endforeach
    @else
        <p>No Recipes found</p>
    @endif
@endsection
