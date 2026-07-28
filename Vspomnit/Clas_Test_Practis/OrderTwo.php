<?php

namespace Vspomnit\Clas_Test_Practis;

class OrderTwo
{
    private int $id;
    private UserTwo $userTwo;
    private array $products = [];
    public function __construct(int $id, UserTwo $userTwo) {
        $this->id = $id;
        $this->userTwo = $userTwo;
    }
    public function addProduct(ProductTwo $productTwo) {
        $this->products[] = $productTwo;
    }
    public function getTotalPrice(): float {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
    public function getTotalTwo(): float {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
    public function getUserTwo(): UserTwo
    {
        return $this->userTwo;
    }
    public function getProducts(): array
    {
        return $this->products;
    }

}