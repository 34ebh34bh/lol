<?php

namespace Vspomnit\Clas_Test_Practis;

class BankService // тут вся логитка
{
    private $comm = 2;
    private TransactionRepository $TransactionRepository;
    public function __construct(TransactionRepository $TransactionRepository) {
//        $this->account = $account;
        $this->TransactionRepository = $TransactionRepository;
    }
    public function deposit(Account $account, $amount) {
        $p = $account->getBalance();
        $res = $p += $amount;
        $account->setBalance($res);
        $type = 'deposit';
        $this->TransactionRepository->add(1,$account->getId(), $type, $amount);
    }
    public function withdraw(Account $account, $amount) {
        $id = random_int(1,100);

        $balance = $account->getBalance();

        $commission = $amount * $this->comm / 100;
        $total = $amount + $commission;

        // 1. лимит
        if ($amount > 100) {
            throw new \Exception('max withdraw 100');
        }

        // 2. проверка баланса
        if ($balance < $total) {
            throw new \Exception('not enough money');
        }

        // 3. списание
        $newBalance = $balance - $total;
        $account->setBalance($newBalance);

        // 4. запись транзакции
        $this->TransactionRepository->add(
            $id,
            $account->getId(),
            'withdraw',
            $total
        );
    }
}