<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $e = trim($email);
    $p = trim($password);

    $smtm = $pdo->prepare("SELECT * FROM crud_2.user WHERE email = ?");
    $smtm->execute([$e]);
    $user = $smtm->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($p, $user['password'])){

        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header('Location:index.php');
        exit();
    }else{
        echo 'Не верный Пароль или логин';
    }
}
?>