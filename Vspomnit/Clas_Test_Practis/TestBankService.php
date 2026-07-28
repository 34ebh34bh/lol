<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestBankService extends TestCase
{
    public function testBankService() {
        $Account = new Account(1,1, 100, 'vip');
        $TransactionRepository = new TransactionRepository();
        $BankService = new BankService($TransactionRepository);

        $BankService->withdraw($Account,50);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('not enough money');
    }
}