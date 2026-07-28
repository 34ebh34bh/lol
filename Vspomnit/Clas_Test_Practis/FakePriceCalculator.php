<?php

namespace Vspomnit\Clas_Test_Practis;

class FakePriceCalculator implements PriceCalculatorInterface
{
    public function calculateDiscount(float $price, float $discont): float
    {
        return $price - ($price * $discont / 100);
    }
    public function CalculateTax(float $priceAfterDiscont, float $tax): float
    {
        return $priceAfterDiscont + ($priceAfterDiscont * $tax / 100);
    }
}