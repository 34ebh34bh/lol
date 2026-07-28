<?php

namespace Vspomnit\Clas_Test_Practis;

class Userfo
{
    private int $id;
    private string $name;
    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }
}