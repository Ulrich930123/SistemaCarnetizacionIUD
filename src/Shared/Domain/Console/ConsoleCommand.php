<?php

namespace GS\Shared\Domain\Console;

interface ConsoleCommand
{
    public function handle() : void;
}
