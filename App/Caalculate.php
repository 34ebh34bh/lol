<?php

namespace App;

class Caalculate
{
    public function plus($a,$b) {
        return $a + $b;
    }
    public function minus($a,$b) {
        return $a - $b;
    }
    public function multiply($a,$b) {
        return $a * $b;
    }
    public function divide($a,$b) {
        return $a / $b;
    }
    public function nolb($a,$b=0) {
        return $a / $b;
    }
    public function pow($a,$b) {
        return $a ** $b;
    }
}