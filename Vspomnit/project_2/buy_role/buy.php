<?php
include __DIR__ . '/../middleware/login.php';
include __DIR__ . '/../middleware/middleware_chekmoder.php';
include __DIR__ . '/../middleware/middleware_check_time_role.php';
include '../connection.php';
session_start();
$id_u = $_SESSION['id'];
$id = $_GET['id'];

$smtm = $pdo->prepare("SELECT * FROM crud_2.roles WHERE id = ?"); // вывод таблица с роялми лоя составления
$smtm->execute([$id]);
$role = $smtm->fetchAll(PDO::FETCH_ASSOC);
foreach ($role as $r) {
    $name = $r['name'];
    $price_role = $r['price'];
    $is_active = $r['is_active'];
    $duration_days = $r['duration_days']; // сколкьо длинтся покупка
}

if ($is_active != 1) {
    echo "Эта роль сейчас не активна";
    header("location:buy_role.php");
    exit();
}

$smtm = $pdo->prepare("SELECT balance_id FROM crud_2.user WHERE id = ? "); // выводим баланс пользователоя
$smtm->execute([$id_u]);
$user = $smtm->fetch(PDO::FETCH_ASSOC);

$balance_id = $user['balance_id'];


if ($balance_id < $price_role) {
    echo 'У вас не хватает ';
    exit();
}

$price = $price_role;
$nevBalance = $balance_id - $price;

$_SESSION['role'] = $name;

$smtm = $pdo->prepare("UPDATE crud_2.user SET role=?, balance_id=? WHERE id = ?"); // меняем роль в бд  на молератора
$smtm->execute([$name, $nevBalance, $id_u]);

$tip = 'Списание';
$status = 'approved';
$date_buy = new DateTimeImmutable(); // дата с дня покупки текущая
$date_buy_bd = $date_buy->format('Y-m-d H:i:s');

$smtm = $pdo->prepare("INSERT INTO crud_2.operation (user_balance_id, tip, summa, status, created_at) VALUES(?,?,?,?,?) ");
$smtm->execute([$id_u, $tip, $price, $status, $date_buy_bd]);

$expires = $date_buy->add(new DateInterval("P".$duration_days."D"));
$date_end = $expires->format("Y-m-d H:i:s");

//$now = new DateTimeImmutable(); // получаем конкретнуб дату
//if ($now >= new DateTimeImmutable($date_end)) {
//    $_SESSION['role'] = 'user'; // ТУТ ОНА КОНЧАЕТСЯ
//    $smtm = $pdo->prepare("UPDATE crud_2.user SET role=? WHERE id = ?");
//    $smtm->execute([$name, $id_u]);
//}

$is_activiti_now = 1;
$smtm = $pdo->prepare("INSERT INTO crud_2.user_role (user_id, role, date_buy, date_end, is_activiti_now) VALUES(?, ?, ?, ?,?)");
$smtm->execute([$id_u, $name, $date_buy_bd, $date_end, $is_activiti_now]);

header("location:/Vspomnit/project_2/index.php");
exit();
?>