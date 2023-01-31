<?php
namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\Uuid;

interface PostRepositoryInterface
{
    public function save(Post $post): void;

    public function get(UUID $uuid): Post;
}