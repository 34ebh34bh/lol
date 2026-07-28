<?php

namespace Vspomnit\oop_project_1\crud_oop;

use PDO;

class UserRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function CreatePost(string $title, string $description): void
    {
        $smtm = $this->pdo->prepare("INSERT INTO crud_3.post (title, description) VALUES (?, ?)");
        $smtm->execute([$title, $description]);
    }
    public function getAllPost(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM crud_3.post");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function FindBuId(int $id): ?array
    {
        $smtm = $this->pdo->prepare("SELECT * FROM crud_3.post WHERE id=?");
        $smtm->execute([$id]);
        $rows = $smtm->fetch(PDO::FETCH_ASSOC);
        return $rows ?: null;
    }
    public function UpdatePost(int $id, string $title, string $description)
    {
        $smtm = $this->pdo->prepare("UPDATE crud_3.post SET title=?, description=? WHERE id=?");
        $smtm->execute([$title,$description,$id]);
    }
    public function DeletePost(int $id): void
    {
        $smtm = $this->pdo->prepare("DELETE FROM crud_3.post WHERE id=?");
        $smtm->execute([$id]);
    }
    public function CheckPost(int $id)
    {
        $smtm = $this->pdo->prepare("SELECT * FROM crud_3.post WHERE id=?");
        $smtm->execute([$id]);
        return $smtm->fetchColumn() !== false;
    }
}