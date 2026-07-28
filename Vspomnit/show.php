<?php
include 'connect.php';
$id = $_GET['id'];
$smtm = $pdo->prepare("SELECT * FROM crud_2.test_note WHERE id=?");
$smtm->execute([$id]);
$user = $smtm->fetch();

$name = $user['name'];
$description = $user['description'];
$prioritet = $user['prioritet'];

echo $name . "<br>";
echo $description . "<br>";
echo $prioritet . "<br>";
?>

