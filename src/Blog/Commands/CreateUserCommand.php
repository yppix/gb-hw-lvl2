<?php

namespace GeekBrains\LevelTwo\Blog\Commands;

use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\UUID;
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\UsersRepositoryInterface;

final class CreateUserCommand
{
    public function __construct(
        private UsersRepositoryInterface $usersRepository
    ) {
    }

    // Вместо массива принимаем объект типа Arguments
    public
    function handle(
        Arguments $arguments
    ): void {
        $username = $arguments->get('username');
        if ($this->userExists($username)) {
            throw new \Error("User already exists: $username");
        }
        $this->usersRepository->save(new User(
                UUID::random(),
                $username,
                $arguments->get('first_name'),
                $arguments->get('last_name'))
        );
    }

    private function userExists(string $username): bool
    {
        try {
            $this->usersRepository->getByUsername($username);
        } catch (\Error) {
            return false;
        }
        return true;
    }
}
