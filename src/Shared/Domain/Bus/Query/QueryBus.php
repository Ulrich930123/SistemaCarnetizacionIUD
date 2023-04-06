<?php

declare(strict_types=1);

namespace GS\Shared\Domain\Bus\Query;

interface QueryBus
{
    public function ask(Query $query) : ?Response;
}