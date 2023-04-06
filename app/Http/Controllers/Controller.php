<?php

namespace App\Http\Controllers;

use Exception;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function printError(Exception $e)
    {

        return $e->getMessage() ." - " . $e->getLine();

    }
}
