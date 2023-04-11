<?php
declare(strict_types=1);

namespace GS\CarneIUDigital\CoreUsers\User\Domain;

interface UserRepository{
    public function Create(User $user);
}