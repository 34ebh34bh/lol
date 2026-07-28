<?php

namespace App;

use PDO;
use PDOException;

class crud
{
    use LogerError;
    private $pdo;
    public function __construct($dns, $user, $pass) {
        try {
            $this->pdo = new PDO($dns, $user, $pass);
            $this->info('Подключение к бд');
        }
        catch (PDOException $e) {
           echo $this->error($e->getMessage());
        }
    }
    public function addcrud($name=null,$description=null,$price=null) {
        if($price === null) {
            $price = 0;
            $this->warning('Вы не ввели значения','0');
        }
        try {
            $stmp = $this->pdo->prepare("INSERT INTO crud.products (name,description,price) VALUES (?,?,?)");
            $stmp->execute([$name,$description,$price]);
            $this->info('Добавление в таблицу');
        }catch(PDOException $e) {
            echo $this->error($e->getMessage());
    }}

    public function getcrud() {
        $stmp = $this->pdo->prepare("SELECT * FROM crud.products");
        $stmp->execute();
        $this->info('Вывод из таблицы');
        $total = 0;
        foreach ($stmp as $row) {
            echo $row['name'] . "\n";
            echo $row['description'] . "\n";
            echo $row['price'] . "\n";
            $total += $row['price'];
            echo $total . "Полная стоимость"."\n";
        }
    }
    public function update($id,$name,$description,$price) {
        $stmt = $this->pdo->prepare("UPDATE crud.products SET name=?,description=?,price=? WHERE id=?");
        $stmt->execute([$name,$description,$price,$id]);
        $this->info('Обновление данных в бд');

    }
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM crud.products WHERE id=?");
        $stmt->execute([$id]);
        $this->info('удаление из бд');

    }
}

