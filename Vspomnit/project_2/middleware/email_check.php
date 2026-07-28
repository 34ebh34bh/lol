<?php
include 'connection.php';
$id = $_SESSION['id'];

$smtm = $pdo->prepare("SELECT email_verefication FROM crud_2.user WHERE id = ?");
$smtm->execute([$id]);
$verif = $smtm->fetch(PDO::FETCH_ASSOC);
$email_verefication = $verif['email_verefication'];

if ($email_verefication === '1') {
    header("location:index.php");
    exit();
}