<?php
declare(strict_types=1);
namespace GS\CarneIUDigital\CoreUsers\User\Domain;

use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserEmail;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserId;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserPassword;
use GS\CarneIUDigital\CoreUsers\User\Domain\ValueObjects\UserUsername;

final class User{
    public function __construct(
        private UserId $userId,
        private UserUsername $username,
        private UserEmail $email,
        private UserPassword $password
    )
    {
        
    }
    public static function Create(
        UserId $userId,
        UserEmail $email,
        UserUsername $username,
        UserPassword $password
    ):self{
        return new self
        (    
            $userId,    
            $username,
            $email,
            $password
        );
        }
        public function id():UserId
        {
            return $this->userId;
        }
    
    public function username():UserUsername
    {
        return $this->username;
    }
    
    public function email():UserEmail
    {
        return $this->email; 
    }
    public function password():UserPassword
    {
        return $this->password;
    }
    public function ToPrimitivesArray()
    {
        return [ 
            'id'=>$this->id()->value(),
            'email'=>$this->email()->value(),
            'username'=>$this->username()->value(),
            'password'=>$this->password()->value()
        ];
    }
}