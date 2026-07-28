<?php
include 'middleware/login.php';
include 'middleware/email_check.php';
session_start();

$email = $_SESSION['email'];
$id = $_SESSION['id'];
$code_post = $_POST['code_post'];

$smtm = $pdo->prepare("SELECT verefication_code FROM crud_2.user WHERE id = ?");
$smtm->execute([$id]);
$verfication_code = $smtm->fetch(PDO::FETCH_ASSOC);

$code = $verfication_code['verefication_code'];

if ($code_post === $code) {
    $smtm = $pdo->prepare("UPDATE crud_2.user SET email_verefication = ? WHERE id = ?");
    $smtm->execute([true, $id]);

    header('location: index.php');
    exit();
}else{
    echo 'Не верный код';
}
?>