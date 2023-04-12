<?php
declare (strict_types=1);
namespace GS\CarneIUDigital\Authentication\Domain;

use GS\Authentication\Domain\ValueObjects\AuthEmail;
use GS\Authentication\Domain\ValueObjects\AuthPassword;
use GS\Authentication\Domain\ValueObjects\AuthUsername;

final class Authentication{
    public function __construct(
        private AuthUsername $username,
        private AuthEmail $email,
        private AuthPassword $password
    )
    {
        
    }
    public static function Create(
        
        AuthUsername $username,
        AuthEmail $email,
        AuthPassword $password
    ):self{
        return new self
        (        
        $username,
        $email,
        $password
        );
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
            'email'=>$this->email()->value(),
            'username'=>$this->username()->value(),
            'password'=>$this->password()->value()
        ];
    }
}