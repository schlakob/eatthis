@extends('layouts.app')

@section('content')
    <h1 class="text-center font-weight-bold mb-2">All recipes</h1>
    <hr>
    <div class="row">
        <a href="/recipes/create" class="btn btn-primary btn-block mb-3 col-12">Create new recipe</a>
    </div>
    @if (count($recipes) > 0)
        <div class="list-group">
            @foreach ($recipes as $recipe)
            @if (true)
                <div class="row">
                    <a href="/recipes/{{$recipe->id}}" class="list-group-item flex-column align-items-start list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <div class="col-8">
                                <h5 class="mb-1 text-secondary font-weight-bold">{{$recipe->title}}</h5>
                            </div>
                            <div class="col-4">
                                <small>Last update on: <span class="text-primary">{{$recipe->updated_at}}</span> by <span class="text-primary">{{$recipe->user->name}}</span></small>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @endforeach
        </div>
    @else
        <p>No Recipes found</p>
    @endif
    <div class="row">
        <a href="/recipes/create" class="btn btn-primary btn-block mt-3 col-12">Create new recipe</a>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$recipes->links()}}
        </div>
    </div>

@endsection
