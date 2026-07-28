<?php

namespace Vspomnit\Clas_Test_Practis;

class CalculateDiscont // как я сделал код более изолированным не зависимым от состояния и впринцепи незыамсммым
{
    public function calculate_discont(float $price, float $discount): float
    {
        $priceDiscont = $price - ($price * $discount / 100); // я вставил аргументы вместо $this->>
        return $priceDiscont;
    }
    public function callculateTax(float $priceDiscont, float $taxProcent, ): float // тут так же от того он стал
        // более не зависимым от состояния калькулятора скидрок, а тесты стали
        // более изалирвоанными как и должно быть в unti testax
    {
        $priceTax = $priceDiscont + ($priceDiscont * $taxProcent / 100);
        return $priceTax;
    }
}

$calc = new CalculateDiscont();
echo $calc->calculate_discont(120,20);
echo $calc->callculateTax(96, 30);

