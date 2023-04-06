<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject\Assert;

use InvalidArgumentException;

trait NotBlank
{
    public function isNotBlank(string $value)
    {
        if (empty($value))
        {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.',
                    static::class,
                    $value));
        }
    }
}
