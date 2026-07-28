<?php

namespace App;

use PDO;

class notebook
{
    public $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function addNotebook($title,$description,$complited) {
        $smtm = $this->pdo->prepare("INSERT INTO crud.notebook (title,description,complited) VALUES (?,?,?)");
        $smtm->execute([$title,$description,$complited]);
        return $this->pdo->lastInsertId();
    }
    public function getBook($id) {
        $smtm = $this->pdo->prepare("SELECT * FROM crud.notebook WHERE id=?");
        $smtm->execute([$id]);
        return $smtm->fetch(PDO::FETCH_ASSOC);
    }
    public function updateBook($id, $title, $description, $complited) {
        $stmt = $this->pdo->prepare("UPDATE crud.notebook SET title=?, description=?, complited=? WHERE id=?");
        $stmt->execute([$title, $description, $complited, $id]);
    }
    public function deleteBook($id) {
        $stmt = $this->pdo->prepare("DELETE FROM crud.notebook WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}