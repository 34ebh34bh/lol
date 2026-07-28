<?php

require_once '../../../vendor/autoload.php';

use Vspomnit\oop_project_1\crud_oop\UserController;
use Vspomnit\oop_project_1\crud_oop\UserRepository;
use Vspomnit\oop_project_1\crud_oop\UserService;

$pass = 'egq34ggwegFA';
$pdo = new PDO('mysql:host=localhost;dbname=crud_3', 'root', $pass);

$UserRepository = new UserRepository($pdo);
$UserService = new UserService($UserRepository);
$UserController = new UserController($UserService);

//$id = $_GET['id'] ?? '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $UserController->edit($id,$title,$description);
    header("Location:index.php");
    exit();
}
?>