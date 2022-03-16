<?php

namespace DI;

use RuntimeException;

class UserController
{
    public function __construct(private UserRepository $userRepository)
    {}

    /**
     * @param UserRepository $userRepository
     */
    public function setUserRepository(UserRepository $userRepository): self
    {
        $this->userRepository = $userRepository;
        return $this;
    }

    public function handle(): string
    {
        $user = $this->userRepository->findByEmail('test@test.com');
        if($user === null){
            throw new RuntimeException('User not found');
        }

        return <<<RESPONSE
User name: $user->name
RESPONSE;

    }
}