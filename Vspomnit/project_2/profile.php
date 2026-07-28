<?php
session_start();
include 'connection.php';
include 'middleware/login.php';

$id = $_SESSION['id'];

$stmt = $pdo->prepare("SELECT * FROM crud_2.user WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f6fb;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            padding: 0 20px;
        }

        .card {
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 22px;
        }

        .header a {
            text-decoration: none;
            color: #4f7cff;
            font-size: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            color: #666;
            font-size: 14px;
        }

        .value {
            font-weight: 500;
        }

        .role {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #e6edff;
            color: #4f7cff;
        }

        .balance {
            font-weight: bold;
            color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">

        <div class="header">
            <h2>Профиль</h2>
            <a href="index.php">← Home</a>
        </div>

        <div class="row">
            <div class="label">Имя</div>
            <div class="value"><?= htmlspecialchars($user['name']) ?></div>
        </div>

        <div class="row">
            <div class="label">Почта</div>
            <div class="value"><?= htmlspecialchars($user['email']) ?></div>
        </div>

        <div class="row">
            <div class="label">Роль</div>
            <div class="value">
                <span class="role"><?= htmlspecialchars($user['role']) ?></span>
            </div>
        </div>

        <div class="row">
            <div class="label">Баланс</div>
            <div class="value balance">
                <?= htmlspecialchars($user['balance_id']) ?> ₽
            </div>
        </div>

        <div class="row">
            <div class="label">Пополнить баланс</div>
            <div class="value balance">
                <a href="balance_up.php">Пополнить</a>
            </div>
        </div>

        <?php
        $smtm = $pdo->prepare("SELECT email_verefication FROM crud_2.user WHERE id = ?");
        $smtm->execute([$id]);
        $user = $smtm->fetch(PDO::FETCH_ASSOC);
        $ver = $user['email_verefication'];

        ?>
        <div class="row">
            <div class="label">Подтвердить почту</div>
            <div class="value balance">
                <?php
                if ($ver === '1') {
                    echo 'verificate';
                } else {
                    echo "<a href='verefication_email.php'>Подтвердить почту</a>";
                }
                ?>
            </div>
        </div>

    </div>
</div>

</body>
</html>
