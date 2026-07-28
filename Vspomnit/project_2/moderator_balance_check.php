<?php
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';
require 'C:/OSPanel/home/ProjVperedIbexSomnenii/Vspomnit/project_2/middleware/middleware_check_time_role.php';

echo "<a href='moderator_check.php'>Назад</a>". "<br>";

$smtm = $pdo->prepare("SELECT * FROM crud_2.operation WHERE status = 'pending' ");
$smtm->execute();
$sts = $smtm->fetchAll(PDO::FETCH_ASSOC);
foreach ($sts as $st) {
    echo 'id заявки: ' . $st['id'] . "<br>";
    echo 'id Пользователя: ' . $st['user_balance_id'] . "<br>";
    echo 'тип пополнения: ' . $st['tip'] . "<br>";
    echo 'сумма: ' . $st['summa'] .' рублей'. "<br>";
    echo 'статус: ' . $st['status'] . "<br>";
    echo 'Дата: ' . $st['created_at'] . "<br>";
    echo "<a href='moder_create_pay.php?id={$st['id']}&id_user={$st['user_balance_id']}'>Перейти</a>";
    echo "<hr>";

}

// суть в том что я делал так,"<a href='moder_create_pay.php?id={$st['user_balance_id']}'>Перейти</a>";
//  а надо работать именно с идентификатором а тоесть с id там должно быть $st['id'] и я юы точной операции делал
?>


