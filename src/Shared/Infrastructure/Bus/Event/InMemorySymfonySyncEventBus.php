<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Bus\Event;

use GS\Shared\Domain\Bus\Event\DomainEvent;
use GS\Shared\Domain\Bus\Event\DomainEventSubscriber;
use GS\Shared\Domain\Bus\Event\EventBus;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use function Lambdish\Phunctional\reduce;

final class InMemorySymfonySyncEventBus implements EventBus
{
    private MessageBus $bus;

    public function __construct(iterable $subscribers)
    {
        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator(
                    $this->forPipedCallables($subscribers)
                )
            )
        ]);
    }

    public function publish(DomainEvent ...$domainEvents): void
    {
        foreach ($domainEvents as $domainEvent) {
            try {
                $this->bus->dispatch($domainEvent);
            } catch (NoHandlerForMessageException $e) {
            }
        }
    }

    public function forPipedCallables(iterable $callables): array
    {
        return reduce(self::pipedCallablesReducer(), $callables, []);
    }

    private function pipedCallablesReducer(): callable
    {
        return static function ($subscribers, DomainEventSubscriber $subscriber): array {
            $subscribedEvents = $subscriber::subscribedTo();

            foreach ($subscribedEvents as $subscribedEvent) {
                $subscribers[$subscribedEvent][] = $subscriber;
            }

            return $subscribers;
        };
    }
}