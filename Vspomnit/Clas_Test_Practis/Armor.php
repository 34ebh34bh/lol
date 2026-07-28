<?php

namespace Vspomnit\Clas_Test_Practis;

class Armor
{
    private string $name;
    private string $type;
    private int $magictype;
    private int $physictype;
    public function __construct(string $name,string $type, int $physictype, int $magictype)
    {
        $this->name = $name;
        $this->type = $type;
        $this->physictype = $physictype;
        $this->magictype = $magictype;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMagictype(): int
    {
        return $this->magictype;
    }

    public function getPhysictype(): int
    {
        return $this->physictype;
    }
}