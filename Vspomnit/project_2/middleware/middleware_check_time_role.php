<?php
include 'C:/OSPanel/home/ProjVperedIbexSomnenii/Vspomnit/connect.php';


session_start();
$id_u = $_SESSION['id'];

$smtm = $pdo->prepare("SELECT date_end FROM crud_2.user_role WHERE user_id = ?");
$smtm->execute([$id_u]);
$dns = $smtm->fetch(PDO::FETCH_ASSOC);
$date_end = $dns['date_end'];

$now = new DateTimeImmutable(); // получаем конкретнуб дату

if ($now >= new DateTimeImmutable($date_end)) { // 90% прафильно но надо доделать до концка, сделать проверку и изменение is_activiti_now и меня в ьаблицу user_role
                            // и разобраться с датами до конца
    $_SESSION['role'] = 'user';
    $role = $_SESSION['role'];
    $smtm = $pdo->prepare("UPDATE crud_2.user SET role=? WHERE id = ?");
    $smtm->execute([$role, $id_u]);
}

?>