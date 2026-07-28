<?php

namespace Vspomnit\oop_project_1\Autentification;

use DateTimeImmutable;

class User
{
    private string $email;
    private string $password_hash;
    private ?int $id;
    private DateTimeImmutable $created_at;
    public function __construct(string $email, string $password_hash, int $id, ?DateTimeImmutable $created_at)
    {
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->id = $id;
        $this->created_at = $created_at;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->created_at;
    }
}