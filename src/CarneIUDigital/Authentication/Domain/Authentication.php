<?php
declare (strict_types=1);
namespace GS\CarneIUDigital\Authentication\Domain;

use GS\CarneIUDigital\Authentication\Domain\ValueObjects\AuthPassword;
use GS\CarneIUDigital\Authentication\Domain\ValueObjects\AuthEmail;
use GS\CarneIUDigital\Authentication\Domain\ValueObjects\AuthRole;
use GS\CarneIUDigital\Authentication\Domain\ValueObjects\AuthUsername;

final class Authentication{
    public function __construct(
        private AuthRole $role,
        private AuthUsername $username,
        private AuthEmail $email,
        private AuthPassword $password
    )
    {
        
    }
    public static function Create(
        AuthRole $role,
        AuthUsername $username,
        AuthEmail $email,
        AuthPassword $password
    ):self{
        return new self
        (        
        $role,
        $username,
        $email,
        $password
        );
        }

  
    public function role():AuthRole
    {
        return $this->role;
    }
    
    public function username():AuthUsername
    {
        return $this->username;
    }
    
    public function email():AuthEmail
    {
        return $this->email; 
    }
    public function password():AuthPassword
    {
        return $this->password;
    }
    public function ToPrimitivesArray()
    {
        return [ 
            'role'=>$this->email()->value(),          
            'email'=>$this->email()->value(),
            'username'=>$this->username()->value(),
            'password'=>$this->password()->value()
        ];
    }
}