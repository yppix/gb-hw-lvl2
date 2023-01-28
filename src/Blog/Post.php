<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\Person\User;

class Post
{
    private int    $id;
    private User   $author;
    private string $title;
    private string $text;

    public function __construct(int $id, User $author, string $title, string $text)
    {
        $this->id     = $id;
        $this->author = $author;
        $this->title  = $title;
        $this->text   = $text;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function __toString()
    {
        return $this->title . ' ' . $this->text;
    }
}