@extends('layouts.app')

@section('content')
    <a href="/recipes" class="btn btn-secondary">Back</a>
    <h1>{{$recipe->title}}</h1>

    <p>{{$recipe->description}}</p>
    <hr>
    <small>Written on: {{$recipe->created_at}}</small>
@endsection
