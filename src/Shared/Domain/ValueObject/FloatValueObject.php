<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;


class FloatValueObject
{
    public function __construct(protected float $value)
    {
    }

    public function value(): float
    {
        return $this->value;
    }
  
    public function __toString(): string
    {
        return (string)$this->value;
    }

    static public function createFromPrimitive(float $value) : self
    {
        return new static($value);
    }
}
