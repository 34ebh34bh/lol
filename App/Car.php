<?php

namespace App;

class Car extends Vehicle
{
    public function move() {
        return 'Bike move speed: ' . $this->speed . " passagners: " . $this->passengers;
    }
}