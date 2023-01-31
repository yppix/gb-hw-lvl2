<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\Blog\User;

class Comment
{
    private UUID   $uuid;
    private User   $authorId;
    private Post   $postId;
    private string $text;

    public function __construct(UUID $uuid, User $author, Post $post, string $text)
    {
        $this->uuid     = $uuid;
        $this->author = $author;
        $this->post   = $post;
        $this->text   = $text;
    }

    public function getId(): UUID
    {
        return $this->uuid;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function __toString()
    {
        return $this->text;
    }
}