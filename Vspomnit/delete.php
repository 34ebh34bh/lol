<?php
include "connect.php";
$id = $_GET['id'];
$smtm = $pdo->prepare("DELETE FROM crud_2.test_note WHERE id = ?");
$smtm->execute([$id]);
header('location:create_noye.php');
exit();
?>