<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestCalcul extends TestCase
{
    public function testCalcul() {
        $Calculate = new Calculate(2,2);// создали и вызвали экземпляр класса
        $res = $Calculate->sum();// создали от экземпляра метод
//        $this->assertEquals(4, $res); // делает равенство == не строего
        $this->assertNull( $res); // тут строгое сравнение и '4' не пожойдкт надо строго 4
    }
}
