<?php

namespace Vspomnit\Clas_Test_Practis;

class Account
{
    private int $id;
    private int $userId;
    private int $balance;
    private string $type;
    PUBLIC function __construct(int $id, int $userId, int $balance, string $type) {
        $this->id = $id;
        $this->userId = $userId;
        $this->balance = $balance;
        $this->type = $type;
    }
    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    public function getType(): string
    {
        return $this->type;
    }
}