<?php
session_start();
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';
                                // Ткт гдето пробел с id видеммо я кладу не id типа котогрый пополняет, а сессии, а в сесси у нас всегда уодин и тот же id , а тоесть можератора, но не польщзователя которыцй поплнил
$id = $_POST['id_ope'];// айди операци
//$id_u = $_SESSION['id'];// айди типа который принимавет
$id_user = $_GET['id_user']; // айди того у кого принимают

$smtm = $pdo->prepare("SELECT * FROM crud_2.operation WHERE id = ?"); //выводятся вся информация из операции
$smtm->execute([$id]);
$ops = $smtm->fetchAll(PDO::FETCH_ASSOC);

foreach ($ops as $op) {
    $status_db = $op['status'];
}

$smtm = $pdo->prepare("SELECT balance_id FROM crud_2.user WHERE id = ?");
$smtm->execute([$id_user]);
$balance = $smtm->fetch(PDO::FETCH_ASSOC);

$summa = $op['summa'];

$status = $_POST['status'];
$sb = $balance['balance_id'] + $summa;

if ($status_db === 'pending') {
    $smtm = $pdo->prepare("UPDATE crud_2.operation SET status = ? WHERE id = ?"); // обращение к операции
    $smtm->execute([$status, $id]);

    $smtm = $pdo->prepare("UPDATE crud_2.user SET balance_id = ? WHERE id = ?");// тут уже работа с балансом
    $smtm->execute([$sb, $id_user]);
    header('location:index.php');
    exit();
}
?>