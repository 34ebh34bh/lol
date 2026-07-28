<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestBank extends TestCase
{
    public function testBank() {
        $account = new Account(1,1,100);
        $bank = new Bank($account);

        $bank->deposit(150);

        $transactions  = $bank->getTransactions();
        $this->assertCount(1, $transactions);
        $this->assertEquals('deposit', $transactions[0]->getType());
        $this->assertEquals(150, $transactions[0]->getAmount());
    }
}