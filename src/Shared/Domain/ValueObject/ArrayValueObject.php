<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;

class ArrayValueObject
{
    public function __construct(protected array $value)
    {
    }

    public function value() : array
    {
        return $this->value;
    }

    public function toJson() : string
    {

        return json_encode($this->value);

    }


}

