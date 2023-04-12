<?php
declare(strict_types=1);

namespace GS\CarneIUDigital\Authentication\Infrastructure;


use Illuminate\Support\Facades\DB;
use GS\CarneIUDigital\Authentication\Domain\Authentication;
use GS\CarneIUDigital\Authentication\Domain\AuthenticationRepository;




final class EloquentAuthenticationRepository implements AuthenticationRepository
{

    public function Create(Authentication $auth)
    {
       DB::table('authentication')->insert($auth->ToPrimitivesArray());
    }
}


