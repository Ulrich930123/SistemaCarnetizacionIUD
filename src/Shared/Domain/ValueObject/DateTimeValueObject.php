<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;

use DateTimeImmutable;

class DateTimeValueObject
{
    public const FORMAT = 'Y-m-d H:i:s';

    protected  false|DateTimeImmutable $value;

    public function __construct(string $value)
    {
        $this->value = DateTimeImmutable::createFromFormat(self::FORMAT, $value);
    }

    public function value(): string
    {
        return $this->value->format(self::FORMAT);
    }

    public function valueDate(): DateTimeImmutable
    {
        return $this->value;
    }
}
