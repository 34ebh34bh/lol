<?php

namespace App;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../App/Caalculate.php';

class CrudTest extends TestCase
{
    public function testplus() {
        $calc = new Caalculate();
        $this->assertEquals(4, $calc->plus(2, 2));
    }
    public function testminus() {
        $calc = new Caalculate();
        $this->assertEquals(0, $calc->minus(2, 2));
    }
    public function testmultiply() {
        $calc = new Caalculate();
        $this->assertEquals(4, $calc->multiply(2, 2));
    }
    public function testdivide() {
        $calc = new Caalculate();
        $this->assertEquals(2, $calc->divide(4, 2));
    }
    public function testnolb() {
        $calc = new Caalculate();
        $this->assertEquals(0, $calc->nolb(0,0));
    }
    public function testnegative() {
        $calc = new Caalculate();
        $this->assertEquals(4,$calc->pow(2,2));
    }
}