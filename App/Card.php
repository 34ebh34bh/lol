<?php

namespace App;

class Card implements PaymentMethod
{
    public function pay($amount)
    {
        return 'Вы оплатили: ' . $amount . 'Биткойна';
    }
}