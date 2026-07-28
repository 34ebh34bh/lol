<?php

namespace Vspomnit\oop_project_1\Autentification;

use PDO;
use DateTimeImmutable;

class UserRepository // этот класс взаимодействует и рабоатет с базой, сохранения в конструктор бд
{
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function save(User $user): void {
        $smtm = $this->pdo->prepare("INSERT INTO resset_password.user (email, password, created_at) VALUES (?, ?, ?)");
        $smtm->execute([
            $user->getPasswordHash(),
            $user->getEmail(),
            $user->getCreatedAt()->format('Y-m-d H:i:s'),

        ]);
    }
    public function findByEmail(string $email): ?User {
        $smtm = $this->pdo->prepare("SELECT * FROM resset_password.user WHERE email = ?");
        $smtm->execute([$email]);
        $user = $smtm->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            (int)$user['id'],
            new DateTimeImmutable($user['created_at'])
        );
    }
    public function findById(int $id): ?User {
        $smtm = $this->pdo->prepare("SELECT * FROM resset_password.user WHERE id = ?");
        $smtm->execute([$id]);

        $user = $smtm->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            return null;
        }

        return new User( // вот оказывается для чего мыф просили создавать обьект user, тут нечего просто так не делается, всё по кусочкам вызывается
            $user['email'],
            $user['password'],
            (int)$user['id'],
            new DateTimeImmutable($user['created_at'])
        );
    }
}