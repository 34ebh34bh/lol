<?php

namespace Vspomnit\Clas_Test_Practis;

class Booking
{
    private int $id;
    private int $roomId;
    private int $nights;
    public function __construct(int $id, int $roomId, int $nights) {
        $this->id = $id;
        $this->roomId = $roomId;
        $this->nights = $nights;
    }

    public function getNights(): int
    {
        return $this->nights;
    }

    public function getRoomId(): int
    {
        return $this->roomId;
    }
}