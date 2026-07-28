<?php

namespace Vspomnit\Clas_Test_Practis;

class Battle
{
    public array $logs = [];
    private Player $player;
    private Enemy $enemy;
    public function __construct(Player $player,Enemy $enemy) {
        $this->player = $player;
        $this->enemy = $enemy;

    }
    public function start(): void
    {
        $logs = [];
        while ($this->player->isAlive() && $this->enemy->isAlive()) {

            $dp = $this->player->attack($this->enemy);
           $atp = "Players attacked {$dp}\n";

           if (!$this->player->isAlive()) {
               $dp = "player death\n";
//               if ($critf === true) {}
//               $cp = ''
               break;
           }

           $dn = $this->enemy->attack($this->player);

           $atn = "enemy attacked {$dn}\n";
           if (!$this->enemy->isAlive()) {
               $dn = "enemy death\n";
               break;
           }
           array_push($this->logs,$atp);
           array_push($this->logs,$dp);
           array_push($this->logs,$atn);
           array_push($this->logs,$dn);

            foreach ($this->logs as $log) {
                echo $log . "<br>";
            }
       }
    }
    public function PlayersAlive(): bool
    {
        return $this->player->isAlive();
    }
    public function PlayersEnemy(): bool
    {
        return $this->enemy->isAlive();
    }
    public function ResultBatle() {
        if ($this->player->isAlive()) {
            echo 'player wins';
        }else {
            echo 'enemy wins';
        }
    }
}