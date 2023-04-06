<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject\Assert;

use InvalidArgumentException;

trait isEmail
{
    public function isEmail(string $value)
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.',
                    static::class,
                    $value));
        }
    }
}
