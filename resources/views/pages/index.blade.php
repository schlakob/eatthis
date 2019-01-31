@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="font-weight-bold"> @auth Welcome to EatThis, <span class="text-primary">{{ Auth::user()->name }}</span>! @else Welcome to EatThis! @endauth </h1>
        <hr>
        <p> This is the easy way to mange your cookingplans. You can look for other recipes, make your own ones and even create yourself a plan for the next days. <br>
             If you want you can take a look to the latest <a href="/recipes">recipes</a>.</p>
        <p>If you want to support me please donate here: <a href="https://paypal.me/schlagenhaufer">PayPal</a></p>
        <hr>
        @guest
            <p>Now don´t waste your time and login or register:</p>
            <a href="/login" class="btn btn-primary btn-block">Login</a>
            <a href="/register" class="btn btn-secondary btn-block">Register</a>
        @endif

    </div>
@endsection
