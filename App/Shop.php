<?php

namespace App;

class Shop
{
    private $shop = [];
    public function addProduct($name, $price) {
        $this->shop[] = [
          'name' => $name,
          'price' => $price
        ];
    }
    public function c() {
        return $this->shop;
    }
}