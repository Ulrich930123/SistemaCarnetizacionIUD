<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\User\UserCreateController;

$router->group ([ 'prefix'=>'user'], function() use ($router)
{
    $router->post('/user',UserCreateController::class);
});