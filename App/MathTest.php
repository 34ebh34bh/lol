<?php

namespace App;

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../App/MathOpperation.php';

class MathTest extends TestCase
{
    public function testMathOpperation(){
        $math = new MathOpperation();
        $this->assertEquals('4',$math->mathtest(2,2));
        $this->assertEquals(4,$math->mathtest(2,2)); // показывает то что всё правильно так как assertQuals
    } // assertEquals это не строгая проверка
    public function testMathOpperation2(){
        $math = new MathOpperation();
        $this->assertSame(4,$math->mathtest(2,2)); // assetrSame делает строгое сравнение и такое '4' не прокатит
    } // assertSame это строгая проверка
    public function testMathOpperation3(){
        $math = new MathOpperation();
        $this->assertTrue(true,$math->mathtest()); // проверка на тру что бы наше значение было булевым типов тру
    }// assertTrue проверка на true
    public function testMathOpperation4(){
        $math = new MathOpperation();
        $this->assertFalse(false,$math->mathtest());
    }
}