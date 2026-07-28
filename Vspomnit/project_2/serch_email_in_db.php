<?php
include "connection.php"; // подключаем бд
require 'C:/OSPanel/home/ProjVperedIbexSomnenii/App/service/MailService.php'; // подключаем phpmailer

$MailService = new MailService(); //экземпляр класса
$email = $_POST['email'];//получаем почту по форму

//что бы не перекидывало и ложно не создавало токен новый, если почтв не была отправленна
if (!$email) {
    header('location: reset_pass.php');
    exit();
}

$smtm = $pdo->prepare("SELECT id FROM crud_2.user WHERE email = ?");// если такая есть то берём id того кто востанавливаеть
$smtm->execute([$email]);
$ems = $smtm->fetch(PDO::FETCH_ASSOC);
$user_id = $ems['id'];

if ($ems === false) {
    echo 'Если пота существует мы отправим вам на неё письмо';
    header("location:login.php");
    exit();
}

$token = bin2hex(random_bytes(32));// создаём токен

$link = "https://projvperedibexsomnenii/Vspomnit/project_2/smena_parolya.php?token=$token"; // ссылка с токеном
$created_at = (new DateTimeImmutable())->format('Y-m-d H:i:s'); // дата когда создан был
$expiries_at = (new DateTimeImmutable(' +30 minutes'))->format('Y-m-d H:i:s'); //задали срок жихни для токена 30 минут

$token_hash = hash('sha256', $token); // хешируем токен

$smtm = $pdo->prepare("INSERT INTO crud_2.password_resset (user_id, token_hash, expiries_at, created_at) VALUES (?,?,?,?)");
$smtm->execute([$user_id, $token_hash, $expiries_at, $created_at]);

echo 'Если пота существует мы отправим вам на неё письмо';
$MailService->send(
    $email,
    'Смена пароля',
    "<a href=$link>Перейти"
);
?>