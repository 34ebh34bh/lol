<?php

namespace Vspomnit\Clas_Test_Practis;

class PostThree
{
    private int $id;
    private int $userId;
    private string $text;


    public function __construct(int $id, int $userId, string $text) {
        $this->id = $id;
        $this->userId = $userId;
        $this->text = $text;

    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }


}