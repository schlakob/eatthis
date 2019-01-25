@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="font-weight-bold">Welcome to EatThis
            @auth{{ Auth::user()->name }} @endauth </h1>
        <hr>
        <p> This ist the easy way to mange your cookingplans. You can look for other recipes, make your own and even make you a plan for the next days. <br>
             If you want you can take a look to the latest <a href="/recipes">recipes</a>.</p>
        <p>If you want to support me please donate here: <a href="https://paypal.me/schlagenhaufer">PayPal</a></p>
        <hr>
        @guest
            <p>Now don´t lose time and login or register:</p>
            <a href="/login" class="btn btn-primary btn-block">Login</a>
            <a href="/login" class="btn btn-secondary btn-block">Register</a>
        @else
            <p>Here you can easy logout:</p>
            <a href="/logout" class="btn btn-primary btn-block">Logout</a>
        @endif

    </div>
@endsection
