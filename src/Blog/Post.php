<?php

namespace GeekBrains\LevelTwo\Blog;

use GeekBrains\LevelTwo\Blog\User;

class Post
{
    private UUID   $uuid;
    private User   $author;
    private string $title;
    private string $text;

    public function __construct(UUID $uuid, User $author, string $title, string $text)
    {
        $this->uuid   = $uuid;
        $this->author = $author;
        $this->title  = $title;
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