<?php

namespace GeekBrains\LevelTwo\Blog;

class User
{
    private UUID $uuid;
    private string $username;
    private string $firstName;
    private string $lastName;

    public function __construct(UUID $uuid, string $username, string $firstName, string $lastName)
    {
        $this->uuid      = $uuid;
        $this->username  = $username;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public function __toString()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getId(): UUID
    {
        return $this->uuid;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

}