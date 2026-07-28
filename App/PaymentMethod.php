<?php

namespace App;

interface PaymentMethod
{
    public function pay($amount);
}