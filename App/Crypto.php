<?php

namespace App;

class Crypto implements PaymentMethod
{
    public function pay($amount)
    {
        return 'Вы оплатили: ' . $amount . 'Биткойна';
    }
}