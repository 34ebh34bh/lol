<?php

namespace Vspomnit\Clas_Test_Practis;

use App\plane;

class Enemy
{
    private string $name;
    public int $hp;
    private int $attack;
    private Weapon $weapon;
    private Armor $armor;
    private int $DodgeChanss;
    public function __construct(string $name,int $hp,int $attack, Weapon $weapon, Armor $armor, int $DodgeChanss)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->weapon = $weapon;
        $this->armor = $armor;
        $this->DodgeChanss = $DodgeChanss;
    }
    public function attackDamage($damage): int {

        $type  = $damage['type'];
        $value  = $damage['value'];

//        $dmg = $damage;

        if ($this->armor) {
            if ($type === 'physical') {
                $value -= $this->armor->getPhysictype();
            }
            if ($type === 'magic') {
                $value -= $this->armor->getMagictype();
            }
            if ($value < 0) {
                $value = 0;
            }
        }
        $this->hp -= $value;
        return $this->hp;
    }
    public function attack($target): int {
        $damage = ['type' => $this->weapon->getType(), 'value' => $this->weapon->getDamage()];
        $rand1 = rand(1, 100);
        $rand2 = rand(1, 100);
        $damahe = $this->attack;
        $damage['value'] += $damahe;

        if ($this->weapon) {
            $weapCkrit = $this->weapon->getCritChance();

//            if ($rand1 <= $weapCkrit) {
//                $damage['value'] *= 2 ;
//            }
        }
//        if ($rand2 <= $this->DodgeChanss) {
//            $damage['value'] = 0;
//            echo ' miss ';
//        }

        $d = $target->attackDamage($damage);
        $lifesteal = $d / 2;
        $this->health($lifesteal);

        return $d;

    }
    public function isAlive(): bool {
        return $this->hp > 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function health($target): int
    {
        $this->hp = $target;
        return $target;
    }

}