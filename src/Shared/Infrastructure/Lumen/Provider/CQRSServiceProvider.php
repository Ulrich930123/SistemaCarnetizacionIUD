<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Provider;

use Illuminate\Support\ServiceProvider;
use GS\Shared\Domain\Bus\Command\CommandBus;
use GS\Shared\Domain\Bus\Event\EventBus;
use GS\Shared\Domain\Bus\Query\QueryBus;

use GS\Shared\Infrastructure\Bus\Command\InMemorySymfonyCommandBus;
use GS\Shared\Infrastructure\Bus\Event\InMemorySymfonySyncEventBus;
use GS\Shared\Infrastructure\Bus\Query\InMemorySymfonySyncQueryBus;


class CQRSServiceProvider extends ServiceProvider
{
    const NAMESPACE = "GS\\Shared\\Infrastructure\\Lumen\\Provider\\";
    public function register()
    {

        foreach (scandir(dirname(__FILE__)) as $file) {
            if (!in_array($file, [".", "..", "CQRSServiceProvider.php"])) {
                $className = self::NAMESPACE.pathinfo($file)['filename'];
                $this->app->register($className);
            }

        }
        $this->app->bind(EventBus::class, function ($app) {
            return new InMemorySymfonySyncEventBus($app->tagged('domain_event_subscriber'));
        });

        $this->app->bind(QueryBus::class, function ($app) {
            return new InMemorySymfonySyncQueryBus($app->tagged('domain_query_handler'));
        });

        $this->app->bind(CommandBus::class, function ($app) {
            return new InMemorySymfonyCommandBus($app->tagged('domain_command_handler'));
        });
    }

}
