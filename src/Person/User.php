<?php

namespace GeekBrains\LevelTwo\Person;

class User
{
    private string $uuid;
    private string $username;
    private string $firstName;
    private string $lastName;

    public function __construct(string $uuid, string $username, string $firstName, string $lastName)
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

    public function getUuid(): string
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