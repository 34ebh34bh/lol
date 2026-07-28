<?php

namespace App;

class ClassTwo // создаётся class под названиеи $ClassTwo, какой мы класс назвали при создание тот тут и используем
{
    private $color = 'blue'; // пуюдличные свойства тут мы можем брать и при наследстве и тд брать назначать как удобно
    private $car; // приватное свойства которое задаётся благодвря гетеру и напрямую к нему нельзя обратиться
    public function lol() {
            return $this->lol. ' числол '.  $this->color . ' Такого вот цвета ';
    }
    public function getCar() {
        return $this->car;
    }
    public function setCar($car) {
        $this->car = $car;
    }
    public function setColor($color) {
        $this->color = $color;
    }
    public function getcolor() {
        return $this->color . ' такой цвет';
    }
}
$ClassTwo = new ClassTwo();
//$ClassTwo->setCar('mazda'); // вот тут задали благодаря сетеру значения
//echo $ClassTwo->getCar(); // а это у нас гетер для получения
//echo $ClassTwo->setColor('red');
//echo $ClassTwo->getcolor();

//$ClassTwo1 = new ClassTwo();
//$ClassTwo1->setColor('lol');
//echo $ClassTwo1->getcolor();