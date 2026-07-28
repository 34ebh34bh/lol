<?php

namespace App;
require 'flyl.php';
class plane implements flyl
{
    public function flyl()
    {
        return 'самолёт летит';
    }
}