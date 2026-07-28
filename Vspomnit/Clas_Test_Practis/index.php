<?php

require_once "User.php";
require_once "Product.php";
require_once "Order.php";
require_once "OrderItem.php";
require_once "OrderService.php";
require_once "OrderRepository.php";
require_once "orderController.php";

use Vspomnit\Clas_Test_Practis\User;
use Vspomnit\Clas_Test_Practis\Product;
use Vspomnit\Clas_Test_Practis\Order;
use Vspomnit\Clas_Test_Practis\OrderItem;
use Vspomnit\Clas_Test_Practis\OrderService;
use Vspomnit\Clas_Test_Practis\OrderRepository;
use Vspomnit\Clas_Test_Practis\orderController;

$OrderRepository = new OrderRepository();
$OrderService = new OrderService($OrderRepository);
$orderController = new orderController($OrderService);

$User = new User(1,'lol','lol@mail.ru');
$Order = new Order(1,$User->getId());
$Product = new Product(1,$User->getId(), 100);
$OrderItem = new OrderItem(1,$User->getId(), $Product->getId(), 3);

$total = 0;

$total += $Product->getPrice() * $OrderItem->getQuantity();
echo $total;
