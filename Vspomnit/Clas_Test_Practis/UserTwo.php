<?php

namespace Vspomnit\Clas_Test_Practis;

class UserTwo
{
    private int $id;
    private string $name;
    private string $email;
    private array $orders = [];
    public function __construct(int $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
    public function addOrder(OrderTwo $orderTwo): void {
        $this->orders[] = $orderTwo;
    }
    public function getOrders(): array
    {
        return $this->orders;
    }

    public function getName(): string
    {
        return $this->name;
    }
}