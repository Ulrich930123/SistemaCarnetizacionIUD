<?php

declare(strict_types=1);

namespace GS\CardIUDigital\User\Application;

use GS\CardIUDigital\User\Domain\ValueObjects\UserEmail;
use GS\CardIUDigital\User\Domain\ValueObjects\UserId;
use GS\CardIUDigital\User\Domain\ValueObjects\UserPassword;
use GS\CardIUDigital\User\Domain\ValueObjects\UserUsername;
use GS\Shared\Domain\Bus\Command\CommandHandler;



final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(private CreateUserService $service)
    {
       
        
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $this->service->create(
            new UserId($command->id()),
            new UserUsername($command->username()),
            new UserEmail($command->email()),
            new UserPassword($command->password())

        );
    }
}
