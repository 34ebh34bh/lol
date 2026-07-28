<?php

namespace App;

use PDO;

class noteboock
{
    use LogerError;
    private $pdo;
    public function __construct($dns,$user,$pass) {
        $this->pdo= new PDO($dns,$user,$pass);
    }
    public function addnoteboock($title, $description,$complited = 0) {
        $smtm = $this->pdo->prepare("INSERT INTO crud.notebook (title,description,complited) VALUES (?,?,?)");
        $smtm->execute([$title,$description,$complited]);
    }
    public function getnotebooks() {
        $smtm = $this->pdo->prepare("SELECT * FROM crud.notebook");
        $smtm->execute();
        $nots = $smtm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nots as $notebook) {
            if ($notebook['complited'] == 0) {
                $n = 'не выполнено';
            } elseif ($notebook['complited'] == 1) {
                $n = 'Выполнено';
            }
            echo "Задание: " . $notebook['title'] . "<br>";
            echo "Описание: " . $notebook['description'] . "<br>";
            echo "Выполнено: " .  $n . "<br><br>";
        }
    }
    public function update($id, $title, $description, $complited = 1) {
        $stmp = $this->pdo->prepare("UPDATE notebook SET title=?,description=?,complited=? WHERE id=?");
        $stmp->execute([$title,$description,$complited,$id]);
    }
    public function delete($id) {
        $stmp = $this->pdo->prepare("DELETE FROM crud.notebook WHERE id=?");
        $stmp->execute([$id]);
    }
    public function complite($id) {
        $stmp = $this->pdo->prepare("UPDATE notebook SET complited=1 WHERE id=?");
        $stmp->execute([$id]);
        $nots = $stmp->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filterName($title) {
        $stmt = $this->pdo->prepare("SELECT * FROM crud.notebook WHERE title LIKE ?");
        $stmt->execute([$title]);
        $nots = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nots as $notebook) {
            if ($notebook['complited'] == 0) {
                $n = 'не выполнено';
            } elseif ($notebook['complited'] == 1) {
                $n = 'Выполнено';
            }
            echo "Задание: " . $notebook['title'] . "<br>";
            echo "Описание: " . $notebook['description'] . "<br>";
            echo "Выполнено: " .  $n . "<br><br>";
        }
    }
}
