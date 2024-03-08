<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Src\Shared\Utils\Http\ApiResponse;
use Src\Shared\Laravel\Mailer\Infrastructure\CustomMailer;
use Src\Shared\Laravel\Mailer\Domain\Auth\RegistroUsuarioEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $mailer =  RegistroUsuarioEmail::create(
    //     email: 'email-pendiente-de-confirmacion@servicio.com',
    //     url: 'http://desarrollo2.zataca.com/api/'
    // );

    // $mailerAsync =  RegistroUsuarioEmail::create(
    //     email: 'email--dos@servicio.com',
    //     url: 'http://desarrollo2.zataca.com/api/'
    // );
    // CustomMailer::create($mailer);
    // CustomMailer::async($mailerAsync);
    $message = 'Email enviado';
    return ApiResponse::json(content: [$message], status: ApiResponse::ESTADO_200_OK);
});
