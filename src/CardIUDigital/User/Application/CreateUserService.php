<?php
declare(strict_types=1);

namespace GS\CardIUDigital\User\Application;

use GS\CardIUDigital\User\Domain\User;
use GS\CardIUDigital\User\Domain\UserRepository;
use GS\CardIUDigital\User\Domain\ValueObjects\UserEmail;
use GS\CardIUDigital\User\Domain\ValueObjects\UserId;
use GS\CardIUDigital\User\Domain\ValueObjects\UserPassword;
use GS\CardIUDigital\User\Domain\ValueObjects\UserUsername;

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
        $this->repository->create($user);
    }
}