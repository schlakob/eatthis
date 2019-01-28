@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold mb-2">All Recipes</h1>
    <hr>
    <a href="/recipes/create" class="btn btn-primary btn-block mb-3">Create new recipe</a>

    @if (count($recipes) > 0)
        <div class="list-group">
            @foreach ($recipes as $recipe)
            <div class="row">
                <a href="/recipes/{{$recipe->id}}" class="list-group-item flex-column align-items-start list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="col-8">
                            <h5 class="mb-1 text-primary font-weight-bold">{{$recipe->title}}</h5>
                        </div>
                        <div class="col-4">
                            <small>Last update on: <span class="text-primary">{{$recipe->created_at}}</span> by <span class="text-primary">{{$recipe->user->name}}</span></small>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach
        </div>
    @else
        <p>No Recipes found</p>
    @endif
    <a href="/recipes/create" class="btn btn-primary btn-block mt-3 mb-4">Create new recipe</a>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$recipes->links()}}
        </div>
    </div>

@endsection
