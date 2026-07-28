<?php

namespace App;
require 'flyl.php';

class bird implements flyl
{
    public function flyl() {
        return 'птица летит';
    }
}