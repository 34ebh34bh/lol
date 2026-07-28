<?php

namespace Vspomnit\Clas_Test_Practis;

class Transaction
{
    private int $id;
    private int $accountId;
    private string $type;
    private int $amount;
    public function __construct(int $id, int $accountId, string $type, int $amount) {
        $this->id = $id;
        $this->accountId = $accountId;
        $this->type = $type;
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getType(): string
    {
        return $this->type;
    }
}