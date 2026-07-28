<?php

namespace App;

use PDO;

class crudThree
{
    private $pdo;
    public function __construct($dsn,$user,$pass) {
        $this->pdo = new PDO($dsn,$user,$pass);
    }
    public function show() {
        $smtm = $this->pdo->prepare("SELECT * FROM crud_2.flag");
        $smtm->execute();
        $flag = $smtm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($flag as $value) {
            echo $value['flag_name'] . "<br>";
        }
    }
    public function create($flag_name) {
        $smtm = $this->pdo->prepare("INSERT INTO crud_2.flag (flag_name) VALUES (?)");
        $smtm->execute([$flag_name]);
    }

    public function delete($flag_name) {
        $smtm = $this->pdo->prepare("DELETE FROM crud_2.flag WHERE flag_name = ?");
        $smtm->execute([$flag_name]);
        echo 'Успешно удалено: ' . $flag_name;
    }
}

