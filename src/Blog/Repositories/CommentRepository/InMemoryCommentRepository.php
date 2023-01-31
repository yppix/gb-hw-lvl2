<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Comment;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\UUID;

class InMemoryCommentRepository implements CommentRepositoryInterface
{
    private array $comments = [];

    public function save(Comment $comment): void
    {
        $this->comments[] = $comment;
    }

    public function get(UUID $uuid): Comment
    {
        foreach ($this->comments as $comment) {
            if ((string)$comment->getId() === (string)$uuid) {
                return $comment;
            }
        }
        throw new \Error("Comment not found: $uuid");
    }
}