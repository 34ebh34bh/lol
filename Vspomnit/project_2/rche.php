<?php
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';

$id = $_GET['id'];

$smtm = $pdo->prepare("SELECT * FROM crud_2.test_note_2 WHERE id = ?");
$smtm->execute([$id]);
$user = $smtm->fetch(PDO::FETCH_ASSOC);

echo "<a href='moderator_post_check.php'>Назад</a>" . "<br>";



    $flag = $_POST['flag'];
$name = $user['name'];
$description = $user['description'];
$prioritet = $user['prioritet'];
$prioritet_level = $user['prioritet_level'];
$flag = $user['flag'];
$created_at = $user['created_at'];
    if ($flag) {
        $smtm = $pdo->prepare("UPDATE crud_2.test_note_2 SET name=?, description=?, prioritet=?, prioritet_level=?, flag=? WHERE id = ?");
        $smtm->execute([$name, $description, $prioritet, $prioritet_level, $flag, $id]);
        header("location:moderator_post_check.php");
        exit();

}

header("location:moderator_post_check.php");
exit();
?>