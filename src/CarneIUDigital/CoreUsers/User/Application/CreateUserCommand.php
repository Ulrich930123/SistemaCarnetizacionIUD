<?php

declare(strict_types=1);

namespace GS\CarneIUDigital\CoreUsers\User\Application;

use GS\Shared\Domain\Bus\Command\Command;
use GS\Shared\Domain\ValueObject\Uuid;

final class CreateUserCommand implements Command

{
    public function __construct(
        
        private $id,
        private $name,
        private $email,
        private $password

    ) {   
    }

    public function id(): string
    {
        return $this->id;
    }

    public function username(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password();
    }
}
