<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject\Assert;

use InvalidArgumentException;

trait Length
{
    public function inRange(string $value, int $min, int $max) : void
    {
        $length = $this->getLengthString($value);
        if (!$min < $length && !$max < $length) throw new InvalidArgumentException(
            sprintf('<%s> does not allow the value <%s>.',
                static::class,
                $value));
    }

    public function equalToLength(string $value, int $limit) : void
    {
        if ($this->getLengthString($value) !== $limit) throw new InvalidArgumentException(
            sprintf('<%s> is not a valid value <%s>',
                static::class,
                $value)
        );

    }

    public function isShorterInLength(string $value, int $limit) : void
    {
        if (! $this->getLengthString($value) < $limit) throw new InvalidArgumentException(
            sprintf('<%s> is not a valid value <%s>',
                static::class,
                $value)
        );
    }

    private function getLengthString(string $value) : int
    {
        return strlen($value);
    }
}
