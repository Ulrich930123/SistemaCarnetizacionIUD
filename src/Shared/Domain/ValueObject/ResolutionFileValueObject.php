<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;

use InvalidArgumentException;

class ResolutionFileValueObject
{
    public function __construct(private array $value)
    {
        $this->ensureIsValidResolutionFile($value);
        $this->value = $value;
    }

    public function value(): array
    {
        return $this->value;
    }

    public function ensureIsValidResolutionFile(array $value)
    {
        foreach ($value as $array) {
            if (!isset($array["id"], $array["name"])) {
                throw new InvalidArgumentException(
                    sprintf(
                        '<%s> is not a valid value <%s>',
                        ResolutionFileValueObject::class,
                        implode(" | ", $array)
                    )
                );
            }
        }
    }
}