<?php

namespace DI;

class UserController
{
    public function handle(): string
    {
        $repo = new UserRepository();
        $user = $repo->findByEmail('test@test.com');
        if($user === null){
            throw new \RuntimeException('User not found');
        }

        return <<<RESPONSE
User name: $user->name
RESPONSE;

    }
}