@extends('home')
    @section('content')
        <div class='container'>
            <h1>{{ config('app.name') }}</h1>
            <p class='header'>Custom content</p>
            <p class='text'>This is a custom page</p>

            <button class='btn-danger'>Custom Button</button>
        </div>
    @endsection

