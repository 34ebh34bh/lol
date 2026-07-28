<?php
require_once '../../../vendor/autoload.php';

use Vspomnit\oop_project_1\crud_oop\UserController;
use Vspomnit\oop_project_1\crud_oop\UserRepository;
use Vspomnit\oop_project_1\crud_oop\UserService;

$pass = 'egq34ggwegFA';
$pdo = new PDO('mysql:host=localhost;dbname=crud_3', 'root', $pass);
$id = $_GET['id'];
$UserRepository = new UserRepository($pdo);
$UserService = new UserService($UserRepository);
$UserController = new UserController($UserService);
$post = $UserController->show($id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="edit.php?id=<?= $post['id'] ?>" method="post">
    <h3>Редактировать данные</h3>
    <input type="hidden" name="id" value="<?= $post['id']?>"">
    <input type="text" value="<?= $post['title']?>" name="title" placeholder="title"><br>
    <input type="text" name="description" value="<?= $post['description']?>" placeholder="description"><br>
    <button type="submit">Обновить</button>
</form>
</body>
</html>


