<?php

namespace Vspomnit\Clas_Test_Practis;
use PHPUnit\Framework\TestCase;

class TestUser extends TestCase
{
    public function testverifed() {
        $user = new User('name', 'email');
        $user->IsVerified();
        $this->assertTrue(true, $user->getIsIsVerified());
    }
}