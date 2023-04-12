<?php

declare(strict_types=1);

namespace GS\CardIUDigital\User\Domain;

use GS\CardIUDigital\User\Domain\ValueObjects\UserEmail;
use GS\CardIUDigital\User\Domain\ValueObjects\UserId;
use GS\CardIUDigital\User\Domain\ValueObjects\UserPassword;
use GS\CardIUDigital\User\Domain\ValueObjects\UserUsername;

final class User
{
    public function __construct(
        private UserId $userId,
        private UserUsername $username,
        private UserEmail $email,
        private UserPassword $password
    ) {
    }
    public static function Create(
        UserId $userId,
        UserEmail $email,
        UserUsername $username,
        UserPassword $password
    ): self {
        return new self(
                $userId,
                $username,
                $email,
                $password
            );
    }
    public function userId(): UserId
    {
        return $this->userId;
    }

    public function username(): UserUsername
    {
        return $this->username;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }
    public function password(): UserPassword
    {
        return $this->password;
    }
    public function ToPrimitivesArray()
    {
        return [
            'id' => $this->userId()->value(),
            'email' => $this->email()->value(),
            'username' => $this->username()->value(),
            'password' => $this->password()->value()
        ];
    }
}
