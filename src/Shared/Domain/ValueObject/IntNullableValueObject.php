<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;

class IntNullableValueObject
{
    public function __construct(protected null|int $value)
    {
    }

    public function isBiggerThan(IntNullableValueObject $other) : bool
    {
        if(!is_int($this->value)) {
            return false;
        }

        return $this->value > $other->value();
    }

    public function value(): int|null
    {
        if (!is_int($this->value)) {
            return null;
        }
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
