<?php
include __DIR__ . '/../middleware/login.php';
include __DIR__ . '/../middleware/middleware_chekmoder.php';
include '../connection.php';

session_start();
$id_u = $_SESSION['id'];
$role_user = $_SESSION['role'];

$id = $_GET['id'];
$smtm = $pdo->prepare("SELECT * FROM crud_2.roles WHERE id = ?");
$smtm->execute([$id]);
$role = $smtm->fetch(PDO::FETCH_ASSOC);

$smtm = $pdo->prepare("SELECT balance_id FROM crud_2.user WHERE id = ?");
$smtm->execute([$id_u]);
$user = $smtm->fetch(PDO::FETCH_ASSOC);

$balance = $user['balance_id'];
$price   = $role['price'];

$active = $role['is_active'] ? 'Активна' : 'Не активна';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Покупка роли</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #555;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .row {
            margin-bottom: 8px;
            color: #333;
        }

        .label {
            color: #777;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            margin: 15px 0;
        }

        .status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 13px;
            background: #e0e7ff;
            color: #3730a3;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
            background: #4f46e5;
            color: #fff;
        }

        .btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .warning {
            color: #dc2626;
            text-align: center;
            margin-top: 10px;
        }

        .balance {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <a class="back" href="/Vspomnit/project_2/buy_role.php">← Назад</a>

    <div class="card">
        <h2><?= htmlspecialchars($role['name']) ?></h2>

        <div class="row">
            <span class="label">Статус:</span>
            <span class="status"><?= $active ?></span>
        </div>

        <div class="row">
            <span class="label">Длительность:</span>
            <?= $role['duration_days'] ?> дней
        </div>

        <div class="price">
            <?= $price ?> ₽
        </div>

        <div class="balance">
            Ваш баланс: <?= $balance ?> ₽
        </div>

        <form action="/Vspomnit/project_2/buy_role/buy.php?id=<?= $id ?>" method="post">
            <?php if ($balance < $price || $role_user === 'moderator'): ?>
                <p class="warning">Недостаточно средств, или ваша роль и так модератор</p>
                <button class="btn" disabled>Купить</button>
            <?php else: ?>
                <button class="btn" type="submit">Купить</button>
            <?php endif; ?>
        </form>
    </div>
</div>

</body>
</html>
