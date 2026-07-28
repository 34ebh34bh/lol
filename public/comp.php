<?php
require_once __DIR__ . '/../public/connect.php';

$id = $_GET['id'] ?? null;

$smtm = $pdo->prepare("UPDATE crud.toodoo SET compleated_at=1 WHERE id = ?");
$smtm->execute([$id]);
header('location:show.php?id='.$id);
exit();