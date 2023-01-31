<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\UUID;
use PDO;

class SqliteUsersRepository implements UsersRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {

    }

    public function save(User $user): void
    {
        $statement = $this->connection->prepare('INSERT INTO users (uuid, username, first_name, last_name) 
          VALUES (:uuid, :username, :first_name, :last_name)');

        $statement->execute([
            ':uuid'       => $user->getId(),
            ':username'   => $user->getUsername(),
            ':first_name' => $user->getFirstName(),
            ':last_name'  => $user->getLastName(),
        ]);
    }

    public function get(UUID $uuid): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE uuid = ?'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // Бросаем исключение, если пользователь не найден
        if (false === $result) {
            throw new \Error(
                "Cannot get user: $uuid"
            );
        }
        return new User(
            new UUID($result['uuid']),
            $result['username'],
            $result['first_name'],
            $result['last_name']
        );
    }

    public function getByUsername(string $username): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE username = ?'
        );
        $statement->execute([
            ':username' => $username,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // Бросаем исключение, если пользователь не найден
        if (false === $result) {
            throw new \Error(
                "Cannot get user: $username"
            );
        }
        return new User(
            new UUID($result['uuid']),
            $result['username'],
            $result['first_name'],
            $result['last_name']
        );
    }
}