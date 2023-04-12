<?php
declare(strict_types=1);
namespace GS\CardIUDigital\User\Infrastructure;

use GS\CardIUDigital\User\Domain\User;
use GS\CardIUDigital\User\Domain\UserRepository;
use Illuminate\Support\Facades\DB;

final class EloquentUserRepository implements UserRepository{
    public function create(User $user): void
    {
        DB::table('user')->insert($user->ToPrimitivesArray());
    }
}