@extends('home')
    @section('content')
        <div class='container mt-4'>
            <div class='container mt-5'>
                <h1>401 Error</h1>
                <p class='header'>Page not accesible</p>
                <p class='text'>The requested page could not be show.</p>
                <div class='card card-header md-5'>
                    <p class='header danger'>You have not authorization</p>
                </div>

                <div class='container mt-5'>
                    <a href='{{ config( 'app.url') }}' class='btn btn-primary'>Go to home</a>
                </div>
        </div>
    @endsection