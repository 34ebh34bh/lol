<?php
require_once __DIR__ . '/../public/connect.php';
$id = $_GET['id'] ?? null;
$smtm = $pdo->prepare("DELETE FROM crud.toodoo WHERE id = ?");
$smtm->execute([$id]);
header('location:home.php');
exit();