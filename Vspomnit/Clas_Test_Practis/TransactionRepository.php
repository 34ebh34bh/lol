<?php

namespace Vspomnit\Clas_Test_Practis;

class TransactionRepository{
    private $transs = [];
   public function add($id,$userId,$type,$amount) {
       $transaction = new Transaction($id,$userId,$type,$amount);
       $this->transs[] = $transaction;
   }
    public function getTranss(): array
    {
        return $this->transs;
    }

}