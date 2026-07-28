<?php
session_start();
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';
require 'C:/OSPanel/home/ProjVperedIbexSomnenii/Vspomnit/project_2/middleware/middleware_check_time_role.php';

$id = $_GET['id'];
$id_user = $_GET['id_user'];
$id_u = $_SESSION['id'];
echo $id_user;
echo "<a href='moderator_balance_check.php'>Назад</a>" . "<br>";
//$smtm = $pdo->prepare("SELECT * FROM crud_2.operation where status = 'pending'");
//$smtm->execute();
//$operation = $smtm->fetch(PDO::FETCH_ASSOC);
//echo 'Статус: ' . $operation['tip'] . "<br>";
//echo 'Сумма: ' . $operation['summa'] . ' Рублей' . "<br>";
//echo 'Статус: ' . $operation['status'] . "<br>";
//echo 'Дата: ' . $operation['created_at'] . "<br>";

$smtm = $pdo->prepare("SELECT * FROM crud_2.operation WHERE id = ?"); // тут просто вывод из бд
$smtm->execute([$id]);
$ops = $smtm->fetchAll(PDO::FETCH_ASSOC);
foreach ($ops as $op) {
    $id_operation = $op['id'];
    echo 'Тип Операции: '. $op['tip'] . '<br>';
    echo 'Сумма: '. $op['summa'] . '  ₽'. '<br>';
    echo 'Статус: '. $op['status'] . '<br>';
    echo 'Дата: '. $op['created_at'] . '<br>';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="approved.php?id_user=<?= $id_user ?>" method="post">
    <input type="hidden" name="id_ope" value="<?= $id_operation ?>">
    <button type="submit" name="status" value="approved">Подтвердить</button>
</form>

<form action="reject.php" method="post">
    <input type="hidden" name="id_ope" value="<?= $id_operation ?>">
    <button type="submit" name="status" value="rejected">Отклонить</button>
</form>

</body>
</html>
<?php
$status = $_POST['status'];

$smtm = $pdo->prepare("UPDATE crud_2.operation SET status = ? WHERE id = ?");
$smtm->execute([$status, $id]);

$s = $op['summa'];
$smtm = $pdo->prepare("UPDATE crud_2.user SET balance_id = ? WHERE id = ?");
$smtm->execute([$s, $id_user]);


header("Location:moderator_balance_check.php");
exit();
?>