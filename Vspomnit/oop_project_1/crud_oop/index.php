<?php
require_once '../../../vendor/autoload.php';

use Vspomnit\oop_project_1\crud_oop\UserController;
use Vspomnit\oop_project_1\crud_oop\UserRepository;
use Vspomnit\oop_project_1\crud_oop\UserService;

$pass = 'egq34ggwegFA';
$pdo = new PDO('mysql:host=localhost;dbname=crud_3','root', $pass);

$UserRepository = new UserRepository($pdo);
$UserService = new UserService($UserRepository);
$UserController = new UserController($UserService);

$posts = $UserController->index();


foreach ($posts as $post) {
    $id = $post['id'];
    echo 'Title: ' . $post['title'] . "<br>";
    echo 'Description: ' . $post['description'] . "<br>";
    echo "<a href='show.php?id={$id}'>Открыть</a>";
    echo "<hr>";
}
echo "<a href='profile.php?id={$id}'>Profile</a>";

?>