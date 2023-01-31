<?php
namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Comment;
use GeekBrains\LevelTwo\Blog\Uuid;

interface CommentRepositoryInterface
{
    public function save(Comment $post): void;

    public function get(UUID $uuid): Comment;
}