<?php

namespace App;

abstract class Vehicle
{
    public $speed = 100;
    public $passengers = 1;
    abstract public function move();
}