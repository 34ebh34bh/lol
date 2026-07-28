<?php

namespace Vspomnit\Clas_Test_Practis;

class Order
{
    private int $id;
    private string $userId;
    private string $status = 'new';
    public function __construct(int $id, string $userId)
    {
        $this->id = $id;
        $this->userId = $userId;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}