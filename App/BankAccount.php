<?php

namespace App;

class BankAccount
{
    public $owner;
    public $balance;
    private $history = [];
    public function __construct($owner, $balance) {
        $this->owner = $owner;
        $this->balance = $balance;
    }
    public function deposit($amount) {
//        echo $this->owner. ' Пополнил счёт на ' . $amount;
//        echo ' Баланс ' .$this->balance += $amount;
        return $this->balance += $amount;
        $this->logTransaction('пополнение', $amount);
    }
    public function withdraw($amount) {
        $total = $this->balance;
        if ($amount > $this->balance) {
            return 'Денег не хватает на балансе. Сумма баланса: ' . $this->balance;
        } else if ($amount <= $total) {
            echo 'Вы сняли: ' . $amount . ' Рублей';
            return ' Баланс ' .$this->balance -= $amount;
            $this->logTransaction('Снятие', $amount);
        }
    }
    public function getBalance() {
        return 'Ваш баланс составляет: '. $this->balance;
    }
    private function logTransaction($type, $amount)
    {
        $this->history[] = [
            'type' => $type,
            'amount' => $amount,
            'balance_after' => $this->balance
        ];
    }

    public function getHistory() {
        return $this->history;
    }
}