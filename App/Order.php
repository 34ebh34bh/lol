<?php

namespace App;

class Order
{
    public $items = [];
    public function addItem($name, $price, $quantity) {
        $this->items[] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $key=>$value) {
            echo $value['name'] . ' стоит  '. $value['price'] . ' в корзине '. $value['quantity'] . PHP_EOL;
            $total += $value['price'] * $value['quantity'];
        }
        return $total;
    }
    private function applyDiscount($total, $percent)
    {
        return $total * ($percent / 100);
    }

    public function checkout($discount = 0) {
        $total = $this->calculateTotal();
        if ($discount > 0) {
            $discount = $this->applyDiscount($total, $discount);
        }
        return $total . ' - Итоговая сумма';
    }
}

