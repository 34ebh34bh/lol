<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use Vspomnit\oop_project_1\crud_oop\UserController;
use Vspomnit\oop_project_1\crud_oop\UserRepository;
use Vspomnit\oop_project_1\crud_oop\UserService;

$pass = 'egq34ggwegFA';
$pdo = new PDO('mysql:host=localhost;dbname=crud_3','root', $pass);

$userRepository = new UserRepository($pdo);
$userService = new UserService($userRepository);
$userController = new UserController($userService);

// Проверяем, что форма отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    try {
        $userController->create($title, $description);
        echo '<p style="color:green">Пост успешно создан!</p>';
    } catch (\RuntimeException $e) {
        echo '<p style="color:red">Ошибка: ' . $e->getMessage() . '</p>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создать Пост</title>
</head>
<body>

<form action="" method="post">
    <h3>Создать Пост</h3>
    <input type="text" name="title" placeholder="Название поста"><br>
    <input type="text" name="description" placeholder="Описание поста"><br>
    <button type="submit">Создать</button>
</form>

</body>
</html>