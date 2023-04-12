<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\User\UserCreateController;

$router->group(['prefix' => 'user'], function () use ($router) {

    $router->post('/create', UserCreateController::class); //Ruta para creado de usuarios
});
