<?php
declare(strict_types=1);
namespace GS\CarneIUDigital\CoreUsers\User\Infrastructure;

use GS\CarneIUDigital\CoreUsers\User\Domain\User;
use GS\CarneIUDigital\CoreUsers\User\Domain\UserRepository;
use Illuminate\Support\Facades\DB;

final class EloquentUserRepository implements UserRepository{
    public function Create(User $user){
        DB::table('user')->insert($user->ToPrimitivesArray());
    }
}