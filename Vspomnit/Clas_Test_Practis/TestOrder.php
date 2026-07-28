<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestOrder extends TestCase
{
    public function testOrder() {
        $cart = new Cart();
        $user = new user('ivan', $cart);
        $order = new Order($user, $cart);
        $this->assertEquals($user, $order->getUser());
        $this->assertEquals($cart, $order->getCart());
    }
    public function testCheckout() {
        $cart = new Cart();
        $user = new user('ivan', $cart);
        $order = new Order($user, $cart);
        $order->checkout();
        $this->assertEquals('paid', $order->getStatus());
    }
    public function testCancellation()
    {
        $cart = new Cart();
        $user = new user('ivan', $cart);
        $order = new Order($user, $cart);
        $order->cancel();
        $this->assertEquals('cancelled', $order->getStatus());
    }
}