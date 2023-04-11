<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\User\UserCreateController;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['prefix' => 'v1', 'middleware' => 'cors'], function () use ($router) {

    /*
     * Function to load route files automatically from routers folder
    */
    $router->get('/health-check', HealthCheckController::class);
    
    
    foreach (scandir(dirname(__FILE__)) as $dir) {
        $dirname = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir;
        if (is_dir($dirname) && !in_array($dir, [".", ".."])) {
            if ($handler = opendir($dirname)) {
                while (false != ($file = readdir($handler))) {
                    if (!in_array($file, [".", ".."])) {
                        $file_route = $dir . DIRECTORY_SEPARATOR . $file;
                        include_once $file_route;
                    }
                }
                closedir($handler);
            }
        }
    }
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/', function () {
        // Uses Auth Middleware
    });

    $router->get('user/profile', function () {
        // Uses Auth Middleware
    });
});
