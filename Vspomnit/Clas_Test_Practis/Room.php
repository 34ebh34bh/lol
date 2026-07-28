<?php

namespace Vspomnit\Clas_Test_Practis;

class Room
{
    private int $id;
    private string $name;
    private int $pricePerNight;
    public function __construct(int $id, string $name, int $pricePerNight) {
        $this->id = $id;
        $this->name = $name;
        $this->pricePerNight = $pricePerNight;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPricePerNight(): int
    {
        return $this->pricePerNight;
    }
}