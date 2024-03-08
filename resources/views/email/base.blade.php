@extends('home')
    @section('content')
        <div class='container mt-5'>
            <div class='card'>
                <div class='card-footer'>
                    <h1 class='header'>¡Bienvenido a {{ config( 'app.name' )}} ! </h1>
                </div>
                <div class='card-body'>
                    <p class='text'>¡Bienvenido a {{ config( 'app.name' )}} ! </p>
                    <p class='text'>Estamos muy felices de contar con un nuevo miembro en nuestro equipo. </p>
                    <p class='text'>Esperamos poder crecer juntos.</p>
                </div>
            </div>
        </div>
    @endsection

