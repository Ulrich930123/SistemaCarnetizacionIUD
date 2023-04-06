<?php

declare(strict_types=1);

namespace GS\Shared\Domain\Bus\Event;

use GS\Shared\Domain\ValueObject\Uuid;

abstract class DomainEvent
{
    public function __construct(
        private string $aggregateId,
        string $eventId = null,
    ){
        $this->eventId = $eventId ?: Uuid::random()->value();
    }

    abstract public static function fromPrimitives(
        string $aggregatedId,
        array $body,
        string $eventId
    );

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }
}