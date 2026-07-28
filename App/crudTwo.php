<?php

namespace App;
use PDO;
class crudTwo
{
    private $pdo;
    public function __construct($dns, $user, $pswd) {
        $this->pdo = new PDO($dns, $user, $pswd);
    }
    public function addCrud($name,$description,$price) {
        $smtm = $this->pdo->prepare("INSERT INTO crud.products (name,description,price) VALUES (?,?,?)");
        $smtm->execute([$name,$description,$price]);
    }
    public function getCrud() {
        $smtm = $this->pdo->prepare("SELECT * FROM crud.products");
        $smtm->execute();
        return $smtm->fetchAll(PDO::FETCH_OBJ);
    }
    public function show($id) {
        $smtm = $this->pdo->prepare("SELECT * FROM crud.products WHERE id=?");
        $smtm->execute([$id]);
        return $smtm->fetch(PDO::FETCH_OBJ);
    }
    public function update($id,$name,$description,$price) {
        $smtm = $this->pdo->prepare("UPDATE crud.products SET name=?,description=?,price=? WHERE id=?");
        $smtm->execute([$name,$description,$price,$id]);
    }
    public function delete($id) {
        $smtm = $this->pdo->prepare("DELETE FROM crud.products WHERE id=?");
        $smtm->execute([$id]);
    }
}