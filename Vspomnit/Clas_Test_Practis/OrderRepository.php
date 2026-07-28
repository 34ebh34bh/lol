<?php

namespace Vspomnit\Clas_Test_Practis;

class OrderRepository // Остановился на этом
{
    private array $Products = [];

    public function add(Product $p) {
        $this->Products[] = $p;
    }
    public function getFindId($id) {
        foreach ($this->Products as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
            return null;
        }
    }
}