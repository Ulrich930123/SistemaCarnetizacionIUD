<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Provider;

use GS\CarneIUDigital\CoreUsers\User\Application\CreateUserCommandHandler;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Interface', 'Implementation');

        $this->app->tag([], 'domain_event_subscriber');

        $this->app->tag([], 'domain_query_handler');

        $this->app->tag([CreateUserCommandHandler::class], 'domain_command_handler');
    }

    public function __invoke() : string
    {
        return static::class;
    }
}
