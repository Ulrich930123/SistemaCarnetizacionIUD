<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Provider;

use GS\CardIUDigital\User\Application\CreateUserCommandHandler;
use GS\CardIUDigital\User\Domain\UserRepository;
use GS\CardIUDigital\User\Infrastructure\EloquentUserRepository;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);

        $this->app->tag([], 'domain_event_subscriber');

        $this->app->tag([], 'domain_query_handler');

        $this->app->tag([CreateUserCommandHandler::class], 'domain_command_handler');
    }

    public function __invoke() : string
    {
        return static::class;
    }
}
