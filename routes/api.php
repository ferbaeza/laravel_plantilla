<?php

use Illuminate\Support\Facades\Route;
use Src\Shared\SharedRegisterRoutes;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('')
    ->middleware('auth:sanctum')
    ->group(function () {
        SharedRegisterRoutes::register();
});