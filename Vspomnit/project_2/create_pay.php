<?php
include 'middleware/login.php';
include 'connection.php';
session_start();

$tip = 'Пополнения';
$summa = $_POST["balance_id"];
$status = 'pending';
$created_at = date('Y-m-d H:i:s');
$user_balance_id = $_SESSION['id'];
echo $user_balance_id;

$smtm = $pdo->prepare("INSERT INTO crud_2.operation (user_balance_id, tip, summa, status, created_at) VALUES (?,?,?,?,?)");
$smtm->execute([$user_balance_id, $tip, $summa, $status, $created_at]);
header("Location:index.php");
exit();
?>