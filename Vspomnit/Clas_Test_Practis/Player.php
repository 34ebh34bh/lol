<?php

namespace Vspomnit\Clas_Test_Practis;

class Player
{
    private string $name;
    public int $hp;
    private int $attack;
    private Weapon $weapon;
    private Armor $armor;
    private int $DodgeChanss;
    private Battle $battle;
    public function __construct(string $name,int $hp,int $attack, Weapon $weapon, Armor $armor, int $DodgeChanss)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->weapon = $weapon;
        $this->armor = $armor;
        $this->DodgeChanss = $DodgeChanss;
    }
    public function attackDamage($damage): int
    {
        $type = $damage['type'];
        $value = $damage['value'];

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
        $damage = ['type' => $this->weapon->getType(),
            'value' => $this->weapon->getDamage()];

        $rand1 = rand(1, 100);
        $rand2 = rand(1, 100);

        $weponD = $this->attack;
        $damage['value'] += $weponD;

        if ($this->weapon) {
//            $weapCkrit = $damage['value'];
//            if ($rand1 <= $weapCkrit) {
//                $damage['value'] *= 2;
//            }
        }
//        if ($rand2 <= $this->DodgeChanss){
//            $damage['value'] = 0;
//            echo ' miss ';
//        }
        $d = $this->attackDamage($damage);

        $lifesteal1 = $d / 2;
        $this->heal($lifesteal1);

        $target->attackDamage($damage);
        return $d;
    }
    public function isAlive(): bool {
        return $this->hp > 0;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function heal($target): int {
        $this->hp += $target;
        return $target;
    }

}
