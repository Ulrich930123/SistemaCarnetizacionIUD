<?php
declare(strict_types=1);
namespace GS\CarneIUDigital\Authentication\Domain;



interface AuthenticationRepository{
    public function Create(Authentication $auth);
}