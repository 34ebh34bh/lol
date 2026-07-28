<?php
include 'connection.php';

$password = $_POST['password'];
$token = $_GET["token"];

$th = hash('sha256', $token);

$smtm = $pdo->prepare("SELECT * FROM crud_2.password_resset WHERE token_hash = ?");
$smtm->execute([$th]);
$rows = $smtm->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    $t = $row['token_hash'];
    $expires_at = $row['expiries_at'];
    $used_at = $row['used_at'];
    $user_id = $row['user_id'];
}

$t_deHash = password_verify($token, $t);

if ($t_deHash === false) {
    echo 'такой не найден';
    header("location:login.php");
    exit();
}

$now = (new DateTimeImmutable())->format('Y-m-d H:i:s');

if ($expires_at <= $now) {
    echo 'он истёк';
    header("location:login.php");
    exit();
}

if ($used_at !== null) {
    echo 'он использованный';
    header("location:login.php");
    exit();
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$smtm = $pdo->prepare("UPDATE crud_2.user SET password = ? WHERE $user_id = ?");
$smtm->execute([$password_hash, $user_id]);

$die_expiriest_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');

$smtm = $pdo->prepare("UPDATE crud_2.password_resset SET used_at = ? WHERE user_id = ?");
$smtm->execute([$die_expiriest_at, $user_id]);

header("location:login.php");
exit();
?>