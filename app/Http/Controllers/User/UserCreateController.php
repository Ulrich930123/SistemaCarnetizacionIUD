<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use GS\CardIUDigital\User\Application\CreateUserCommand;
use GS\Shared\Domain\Bus\Command\CommandBus;
use Exception;


final class UserCreateController extends Controller
{
    public function __construct(private CommandBus $commandBus)
    {
        
        
    }
    public function _invoke(CreateUserRequest $request)
    {
        
        try{
            $command=new CreateUserCommand(
                $request->get('id'),
                $request->get('username'),
                $request->get('email'),
                $request->get('password')
            );
            $this->commandBus->dispatch($command);
            return response()->json([
                'success'=>true,
                'payload'=>[]
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'success'=>false,
                'payload'=>[],
                'error'=>[
                    'code'=>321,
                    'message'=>$e->getMessage()
                ]
            ]);
        }
    }
}