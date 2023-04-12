<?php
declare(strict_types=1);

namespace GS\CardIUDigital\User\Domain;

interface UserRepository
{
    public function create(User $user):void;

}