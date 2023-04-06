<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;

class StringNullableValueObject
{
    public function __construct(protected null|string $value)
    {
    }

    public function value() : string|null
    {
        return $this->value;
    }
}
