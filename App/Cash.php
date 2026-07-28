<?php

namespace App;

class Cash implements PaymentMethod
{
    public function pay($amount)
    {
        return 'Вы оплатили: ' . $amount . 'наличкой';
    }
}