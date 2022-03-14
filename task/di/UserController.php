<?php

namespace DI;

class UserController
{
    public function handle(): string
    {
        $repo = new UserRepository();
        $user = $repo->findByEmail('serg@test1.com');
        if($user === null){
            throw new \RuntimeException('User not found');
        }

        return <<<RESPONSE
User name: $user->name
RESPONSE;

    }
}