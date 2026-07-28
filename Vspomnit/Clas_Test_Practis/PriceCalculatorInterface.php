<?php

namespace Vspomnit\Clas_Test_Practis;

interface PriceCalculatorInterface
{
    public function calculateDiscount(float $price, float $discont);
    public function calculateTax(float $priceAfterDiscont, float $tax);
}