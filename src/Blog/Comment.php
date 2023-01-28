<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\Person\User;

class Comment
{
    private int    $id;
    private User   $authorId;
    private Post   $postId;
    private string $text;

    public function __construct(int $id, User $author, Post $post, string $text)
    {
        $this->id     = $id;
        $this->author = $author;
        $this->post   = $post;
        $this->text   = $text;
    }

    public function getId(): int
    {
        return $this->id;
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