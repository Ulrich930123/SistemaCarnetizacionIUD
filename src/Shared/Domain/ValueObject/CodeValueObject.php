<?php

declare(strict_types=1);

namespace GS\Shared\Domain\ValueObject;

use InvalidArgumentException;

class CodeValueObject
{
    public function __construct(protected string $value)
    {
        $this->codeGenerate($this->value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function codeGenerate(string $value)
    {
        if (!preg_match("/(20|21)+([\d]){2}(059927)+([\d]){1,4}$/", $value)) {
            throw new InvalidArgumentException(
                sprintf(
                    '<%s> does not allow the value <%s>.',
                    CodeValueObject::class,
                    $this->value

                )
            );
        }
    }
}
