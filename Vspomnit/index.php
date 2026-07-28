<?php
include 'connect.php';

echo "<a href='razgon.php'>Create</a>" . "<br><br>";

$smtm = $pdo->prepare("SELECT * FROM crud_2.test_note");
$smtm->execute();
$users = $smtm->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user) {
    $id = $user['id'];
    echo $user['name'] . "<br>";
    echo $user['description'] . "<br>";
    echo $user['prioritet'] . "<br>";
        echo "<a href='show.php?id={$id}'>show</a>" . "<br>";
        echo "<a href='update.php?id={$id}'>update</a>" . "<br>";
        echo "<a href='delete.php?id={$id}'>delete</a>" . "<br>";
    echo "<hr>";
}
?>