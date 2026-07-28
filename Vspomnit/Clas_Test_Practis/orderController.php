<?php

namespace Vspomnit\Clas_Test_Practis;

class orderController
{
    private OrderService $orderService;
    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }
    public function craetre($userId) { // по примеру посоеднего промта доделать
        $this->orderService->create($userId);
    }
    public function getfindId($id) {
        return $this->orderService->getfindId($id);
    }
}