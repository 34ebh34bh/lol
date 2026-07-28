<?php

namespace Vspomnit\Clas_Test_Practis;

class OrderItem
{
    private int $id;
    private string $userId;
    private int $productId;
    private int $quantity;
    public function __construct(int $id, string $userId, int $productId, int $quantity)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}