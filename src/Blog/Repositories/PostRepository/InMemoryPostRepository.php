<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\UsersRepository;

use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\UUID;

class InMemoryPostRepository implements PostRepositoryInterface
{
    private array $posts = [];

    public function save(Post $post): void
    {
        $this->posts[] = $post;
    }

    public function get(UUID $uuid): Post
    {
        foreach ($this->posts as $post) {
            if ((string)$post->getId() === (string)$uuid) {
                return $post;
            }
        }
        throw new \Error("Post not found: $uuid");
    }
}