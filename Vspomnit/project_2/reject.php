<?php
session_start();
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';

$id = $_POST['id_ope'];

$smtm = $pdo->prepare("SELECT * FROM crud_2.operation WHERE id = ?");
$smtm->execute([$id]);
$ops = $smtm->fetchAll(PDO::FETCH_ASSOC);

foreach ($ops as $op) {
    $status_db = $op['status'];
}

$status = $_POST['status'];

if ($status_db === 'pending') {
    $smtm = $pdo->prepare("UPDATE crud_2.operation SET status = ? WHERE id = ?");
    $smtm->execute([$status, $id]);
    header('location:index.php');
    exit();
}
?>