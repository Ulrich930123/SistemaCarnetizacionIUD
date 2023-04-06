<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Provider;

use GS\HealthCheck\Application\HealthCheckQueryHandler;
use Illuminate\Support\ServiceProvider;

class HealthCheckServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Interface', 'Implementation');

        $this->app->tag([], 'domain_event_subscriber');

        $this->app->tag([
            HealthCheckQueryHandler::class
        ], 'domain_query_handler');

        $this->app->tag([], 'domain_command_handler');
    }

    public function __invoke() : string
    {
        return static::class;
    }
}
