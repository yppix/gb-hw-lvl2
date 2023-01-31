<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\UUID;
use PDO;

class SqlitePostRepository implements PostRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {

    }

    public function save(Post $post): void
    {
        $statement = $this->connection->prepare('INSERT INTO posts (uuid, user_uuid, title, text) 
          VALUES (:uuid, :user_uuid, :title, :text)');

        $statement->execute([
            ':uuid'      => $post->getId(),
            ':user_uuid' => $post->getAuthor(),
            ':title'     => $post->getTitle(),
            ':text'      => $post->getText(),
        ]);
    }

    public function get(UUID $uuid): Post
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE uuid = ?'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // Бросаем исключение, если пользователь не найден
        if (false === $result) {
            throw new \Error(
                "Cannot get post: $uuid"
            );
        }
        return new Post(
            new UUID($result['uuid']),
            $result['user_uuid'],
            $result['title'],
            $result['text']
        );
    }
}