<?php

namespace App;
use PDO;
class UserRepository
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function addUser($name, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
        return $this->pdo->lastInsertId();
    }
    public function getUsersAll() {
        $smtm = $this->pdo->prepare("SELECT * FROM crud.users");
        $smtm->execute();
        return $smtm->fetchAll(PDO::FETCH_ASSOC);
    }
}