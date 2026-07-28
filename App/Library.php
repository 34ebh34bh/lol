<?php

namespace App;

use PDO;
use PDOException;

class Library
{
    use LogerError;
    private $pdo;
    public function __construct($dsn, $user, $pass)
    {
        try {
            $this->pdo = new PDO($dsn, $user, $pass);
        }catch (PDOException $e){
            $this->error("Ошибка подключения: " .$e->getMessage());
        }
    }
    public function addBoock($name, $description, $price) {
        try {
            $stmp = $this->pdo->prepare("INSERT INTO crud.products (name, description, price) VALUES (?, ?, ?)");
            $stmp->execute([$name, $description, $price]);
        }catch (PDOException $e){
            $this->error("Ошибка при заполнение: ".$e->getMessage());
        }
    }
    public function getBoock()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

