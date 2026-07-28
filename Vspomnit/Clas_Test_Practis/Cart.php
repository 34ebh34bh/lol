<?php

namespace Vspomnit\Clas_Test_Practis;

class Cart
{
    private array $products = [];
    public function addProduct(Product $product): void{
        $this->products[] = $product;
    }
    public function getTotal(): int{
        $total = 0;

        foreach ($this->products as $product){
            $total += $product->getPrice();
        }
        return $total;
    }
    public function ProductList(){
        return $this->products;
    }

}