@extends('home')
    @section('content')
        <div class='container'>
            <h1 class='header'>Custom content</h1>
            <p class='text'>Hola {{ $email }},</p>
            <p class='text'>¡Ya tienes tu cuenta de {{ config( 'app.name' )}} creada!</p>
            <p class='text'>Por favor, accede al siguiente enlace para validar tu email y poder acceder al sistema.</p>

            <a class='btn-dark rounded-lg border-white' href={{ $url }}>
                <button class='btn-dark rounded-lg border-white'>
                    Valida tu E-mail
                </button>
            </a>
        </div>
    @endsection

