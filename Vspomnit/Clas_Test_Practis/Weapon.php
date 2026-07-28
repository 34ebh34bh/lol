<?php

namespace Vspomnit\Clas_Test_Practis;

class Weapon
{
    private string $name;
    private int $damage;
    private int $critChance;
    private string $type;
    public function __construct(string $name, int $damage, int $critChance, string $type) {
        $this->name = $name;
        $this->damage = $damage;
        $this->critChance = $critChance;
        $this->type = $type;
    }
    public function getDamage(): int
    {
        return $this->damage;
    }
    public function getCritChance(): int
    {
        return $this->critChance;
    }

    public function getType(): string
    {
        return $this->type;
    }
} // Тут дописать и добавить ход одно оружие