<?php

namespace App;

class Bus extends Vehicle
{
    public function move() {
        return 'Bus moveng' . ' speed: ' . $this->speed. ' Passengers: ' .$this->passengers;
    }
}