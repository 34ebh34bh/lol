<?php

namespace App;

class Calculate
{
    private $a;
    private $b;
    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }
    public function sum() {
        return $this->a + $this->b;
    }
    public function otvet() {
        return $this->sum();
    }
}