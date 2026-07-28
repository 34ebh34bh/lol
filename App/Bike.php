<?php

namespace App;

class Bike extends Vehicle
{
    public function move() {
        return 'Bike move speed: ' . $this->speed . " passagners: " . $this->passengers;
    }
}