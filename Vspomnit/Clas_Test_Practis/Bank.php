<?php

namespace Vspomnit\Clas_Test_Practis;

class Bank
{
    private  Account $account;
    private array $transactions = [];
    public function __construct(Account $account) {
        $this->account = $account;
    }
    public function deposit($amount) {
        $d = $this->account->getBalance();
        $res = $d += $amount;
        $this->account->setBalance($res);
        $t = new Transaction(1,1, 'deposit', $amount);
        $this->transactions[] = $t;
    }
    public function withdraw($amount) {
        if($this->account->getBalance() < $amount) {
            echo ('Не достаточно средств');
            return;
        }
        $d = $this->account->getBalance();
        $res = $d -= $amount;
        $this->account->setBalance($res);
        $t = new Transaction(1,1, 'withdraw', $amount);
        $this->transactions[] = $t;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }
    public function getType(Transaction $transaction): Transaction {
         return $transaction->getType();
    }
    public function getAmount(Transaction $transaction): Transaction {
        return $transaction->getAmount();
    }
}
