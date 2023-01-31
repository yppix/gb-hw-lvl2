<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Comment;
use GeekBrains\LevelTwo\Blog\UUID;
use PDO;

class SqliteCommentRepository implements CommentRepositoryInterface
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {

    }

    public function save(Comment $comment): void
    {
        $statement = $this->connection->prepare('INSERT INTO comments (uuid, user_uuid, post_uuid, text) 
          VALUES (:uuid, :user_uuid, :post_uuid, :text)');

        $statement->execute([
            ':uuid'      => $comment->getId(),
            ':user_uuid' => $comment->getAuthor(),
            ':post_uuid' => $comment->getPost(),
            ':text'      => $comment->getText(),
        ]);
    }

    public function get(UUID $uuid): Comment
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM comments WHERE uuid = ?'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // Бросаем исключение, если пользователь не найден
        if (false === $result) {
            throw new \Error(
                "Cannot get comment: $uuid"
            );
        }
        return new Comment(
            new UUID($result['uuid']),
            $result['user_uuid'],
            $result['post_uuid'],
            $result['text']
        );
    }
}