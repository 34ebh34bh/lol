<?php

namespace App;

use PHPUnit\Framework\TestCase; //наследуется как и любая другая тест от TestCase
use PDO;//подклббчаем пдо
use App\Notebook;//класс который тестируем
use function PHPUnit\Framework\assertEquals; // фенкция для тестиования
use function PHPUnit\Framework\assertSame;//фенкция для тестиования

require_once __DIR__ . '/../App/notebook.php';

class NotebookTest extends TestCase
{
    private $pdo;
    private $notebook;

    protected function setUp(): void
    {//подклчились к бд
        $dsn = 'mysql:host=localhost;dbname=crud;charset=utf8'; // подклбчение к пдо бд идёт у нас вот тут по частяи
        $user = 'root';
        $password = 'egq34ggwegFA';

        $this->pdo = new PDO($dsn, $user, $password); // подставили всё доя пдо
        $this->notebook = new Notebook($this->pdo); // это подклюбчение суём сюда этот notebook у нас раюоетт как репозиторий
    }

    public function testadd()
    {
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS crud.notebook (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100),
            description VARCHAR(100),
            complited VARCHAR(100)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

        $id = $this->notebook->addNotebook('qwe','wqeqwedwe',1);
        $smtm = $this->pdo->prepare("SELECT * FROM crud.notebook WHERE id = ?");
        $smtm->execute([$id]);
        $note = $smtm->fetch(PDO::FETCH_ASSOC);

        assertEquals('qwe', $note['title']);
        assertEquals('wqeqwedwe', $note['description']);
        assertEquals('1', $note['complited']);
    }
    public function testRead()
    {
        // Создаём таблицу (если её нет)
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS crud.notebook (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100),
            description VARCHAR(100),
            complited TINYINT
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
        // Добавляем запись для теста
        $stmt = $this->pdo->prepare("INSERT INTO crud.notebook (title, description, complited) VALUES (?, ?, ?)");
        $stmt->execute(['qwdqw', 'qwdqwdq', 1]);
        $id = $this->pdo->lastInsertId();

        // Получаем её через твой метод
        $note = $this->notebook->getBook($id);
        $note = $note[0]; // fetchAll() возвращает массив, достаём первый элемент

        // Проверяем данные
        $this->assertEquals('qwdqw', $note->title);
        $this->assertEquals('qwdqwdq', $note->description);
        $this->assertEquals(1, $note->complited);
    }
    public function testUpdate() {
        // 1️⃣ Создаём таблицу, если её нет
        $this->pdo->exec("
        CREATE TABLE IF NOT EXISTS crud.notebook (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100),
            description VARCHAR(100),
            complited TINYINT(1)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

        // 2️⃣ Добавляем тестовую запись
        $id = $this->notebook->addNotebook('Старая запись', 'Описание старое', 0);

        // 3️⃣ Обновляем запись через метод класса
        $this->notebook->updateBook($id, 'Новое имя', 'Новое описание', 1);

        // 4️⃣ Получаем запись из базы
        $stmt = $this->pdo->prepare("SELECT * FROM crud.notebook WHERE id = ?");
        $stmt->execute([$id]);
        $note = $stmt->fetch(PDO::FETCH_ASSOC);

        // 5️⃣ Проверяем, что данные обновились
        $this->assertEquals('Новое имя', $note['title']);
        $this->assertEquals('Новое описание', $note['description']);
        $this->assertEquals(1, $note['complited']);
    }
    public function testDelete()
    {
        // Создаём таблицу на всякий случай
        $this->pdo->exec("
    CREATE TABLE IF NOT EXISTS crud.notebook (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100),
        description VARCHAR(255),
        complited TINYINT(1)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

        // Добавляем запись
        $id = $this->notebook->addNotebook('lol', 'desc', 0);

        // Проверяем, что она есть
        $note = $this->notebook->getBook($id);
        $this->assertNotNull($note, 'Запись не найдена после вставки');
        $this->assertEquals('lol', $note['title']);

        // Удаляем
        $this->notebook->deleteBook($id);

        // Проверяем, что удалена
        $deleted = $this->notebook->getBook($id);
        $this->assertEmpty($deleted, 'Запись не была удалена');
    }
}
