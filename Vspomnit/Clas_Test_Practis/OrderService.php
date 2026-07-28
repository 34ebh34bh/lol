<?php

namespace Vspomnit\Clas_Test_Practis;
class OrderService
{
    private int $id = 1;
    private OrderRepository $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function create($userId)
    {
        $order = new Order($this->id++, $userId);
        $this->orderRepository->add($order);

    }
    public function getfindId($id) {
        return $this->orderRepository->getFindId($id);
    }
    public function total($items, $repo) { // айтем это то что пролукт который мы перебираем
        $total = 0;

        foreach ($items as $item) {
            $product = $repo->findById($item->id);
            $total += $product->price * $item->quantity;
        }
        return $total;
    }
}