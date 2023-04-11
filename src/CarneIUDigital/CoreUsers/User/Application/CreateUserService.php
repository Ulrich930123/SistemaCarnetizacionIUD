<?php
declare(strict_types=1);

namespace GS\CarneIUDigital\CoreUsers\User\Application;

use GS\CarneIUDigital\CoreUsers\User\Domain\User;
use GS\CarneIUDigital\CoreUsers\User\Domain\UserRepository;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserEmail;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserId;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserPassword;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserUsername;

final class CreateUserService{
    public function __construct(private UserRepository $repository)
    {

    }
    public function Create(
        UserId $userId,
        UserUsername $username,
        UserEmail $email,
        UserPassword $password
    )
    {
        $user=User::Create(
            $userId,
            $email,
            $username,
            $password);
        $this->repository->Create($user);
    }
}