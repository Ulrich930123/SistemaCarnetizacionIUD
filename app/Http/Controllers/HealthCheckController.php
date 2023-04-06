<?php

namespace App\Http\Controllers;

use GS\HealthCheck\Application\HealthCheckQuery;
use Illuminate\Http\Request;
use GS\Shared\Domain\Bus\Query\QueryBus;
use Illuminate\Http\JsonResponse;

class HealthCheckController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private QueryBus $queryBus)
    {
        
    }

    public function __invoke(): JsonResponse
    {

        $query = new HealthCheckQuery;
        $response = $this->queryBus->ask($query);

        try {
            
            return response()->json([
                "success" => true,
                "payload" => [
                    "data" => $response->ping()
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "code"    => "321",
                "payload" => [
                    "error" => $this->printError($e)
                ]
            ]);
        }

       
    }

    //
}
