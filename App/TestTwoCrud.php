<?php

namespace App;
use PHPUnit\Framework\TestCase;
use PDO;
use App\UserRepository;
require_once __DIR__ . '/../App/UserRepository.php';

class TestTwoCrud extends TestCase
{
    private $pdo;
    private $repo;

    protected function setUp(): void
    {
        $dsn = 'mysql:host=localhost;dbname=crud;charset=utf8'; // подклбчение к пдо бд идёт у нас вот тут по частяи
        $user = 'root';
        $password = 'egq34ggwegFA';
        // создаём реальный PDO
        $this->pdo = new PDO($dsn, $user, $password);// это у нас пиременная pdo тут у нас и собирается подключение
        // передаём его в репозиторий
        $this->repo = new UserRepository($this->pdo); // тут у нас создаётся экземпляр класса и там хранится уже всё этол део
    }
    public function testadd() { // подключаемся к бд и создаём тьаблицк с теми полями что будем тестировать
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100),
            email VARCHAR(100),
            password VARCHAR(100)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

        $id = $this->repo->addUser('perdunov', 'perdunov@gmail.com', 'red343'); // тут мы заполняем её данными

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?"); // делаем простой запрос на добавления
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals('perdunov', $user['name']);
        $this->assertEquals('perdunov@gmail.com', $user['email']);
        $this->assertEquals('red343', $user['password']);
    }
}