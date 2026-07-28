<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestRpgClass extends TestCase
{
    public function testatack() {
        $sword = new Weapon("MagPalka",30,15,'magic');
        $fireball = new Weapon("Kamen",45,25, 'physical');

        $mag = new Armor('Тяжёлая броня', 'physical',50,10);
        $fiz = new Armor('Тяжёлая броня', 'magic',10,40);

        $Player = new Player('ivan',100,10, $sword, $mag,10);
        $Enemy = new Enemy('dragon',100,10, $fireball, $fiz,10);
        $attac = $Player->attack($Enemy);
        $this->assertEquals(15, $attac);
    }
    public function testarmor() {
        $sword = new Weapon("MagPalka",12,15,'magic');
        $fireball = new Weapon("Kamen",31,25, 'physical');

        $fiz = new Armor('Тяжёлая броня', 'physical',20,30);
        $mag = new Armor('Тяжёлая броня', 'magic',11,20);

        $Player = new Player('ivan',100,14, $sword, $fiz,10);
        $Enemy = new Enemy('dragon',100,11, $fireball, $mag,10);
//        $attac = $Player->attack($Enemy);
//        $dam = ['type' => 'magic',  'value' => 1];
        $a = $Player->attack($Enemy);
//        $da = $Player->attackDamage($dam);
        $this->assertEquals(15, $a);
    }
    public function testlifesteal()
    {
        $sword = new Weapon("MagPalka",30,15,'magic');
        $fireball = new Weapon("Kamen",45,25, 'physical');

        $fiz = new Armor('Тяжёлая броня', 'physical',40,20);
        $mag = new Armor('Тяжёлая броня', 'magic',5,40);

        $Player = new Player('ivan',100,40, $sword, $fiz,10);
        $Enemy = new Enemy('dragon',100,10, $fireball, $mag,10);

        $h = $Player->attack($Enemy);
        $this->assertEquals(1,$h);
    }
}