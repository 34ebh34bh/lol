<?php

namespace Vspomnit\Clas_Test_Practis;

class Project
{
    private int $id;
    private string $name;
    private int $userId;
    public function __construct(int $id, string $name, int $userId) {
        $this->id = $id;
        $this->name = $name;
        $this->userId = $userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->name;
    }
}