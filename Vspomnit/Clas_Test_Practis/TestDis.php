<?php

namespace Vspomnit\Clas_Test_Practis;
use PHPUnit\Framework\TestCase;

class TestDis extends TestCase
{
    public function testDiscont(){
        $calcdis = new CalculateDiscont();
        $res = $calcdis->calculate_discont(144,32);
        $this->assertEquals(97.92, $res);
    }
    public function testTax(){ // сделал изолированным епго теперь не нвдо вызывать сначало калькулятор скидки а можно сразу налога
        $calcTax = new CalculateDiscont;
        $res = $calcTax->callculateTax(97.92,22);
        $this->assertEquals(119.4624, $res);
    }
}