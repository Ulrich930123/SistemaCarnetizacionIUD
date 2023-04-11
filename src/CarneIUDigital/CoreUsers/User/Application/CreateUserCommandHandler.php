<?php

declare(strict_types=1);

namespace GS\CarneIUDigital\CoreUsers\User\Application;

use GS\Shared\Domain\Bus\Command\CommandHandler;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserId;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserEmail;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserPassword;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserUsername;


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
