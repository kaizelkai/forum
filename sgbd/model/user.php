<?php

class User extends Auditing
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $profileUrl;

    public function __construct(int $id, string $username, string $email, string $password, string $profileUrl, int $createdBy)
    {
        parent::__construct($createdBy);
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->profileUrl = $profileUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getProfileUrl(): string
    {
        return $this->profileUrl;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setProfileUrl(string $profileUrl): void
    {
        $this->profileUrl = $profileUrl;
    }
}