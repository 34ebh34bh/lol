<?php
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';
require 'C:/OSPanel/home/ProjVperedIbexSomnenii/Vspomnit/project_2/middleware/middleware_check_time_role.php';

$smtm = $pdo->prepare("SELECT * FROM crud_2.test_note_2 WHERE flag = 'pending'");
$smtm->execute();
$post = $smtm->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Модерация постов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }

        .container {
            max-width: 600px;
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
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .card p {
            margin: 8px 0;
        }

        .date {
            font-size: 14px;
            color: #888;
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 16px;
            background: #4f46e5;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
        }

        .empty {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <a class="back" href="moderator_check.php">← Назад</a>

    <?php if ($post === false): ?>
        <div class="empty">
            Пока запросов нет
        </div>
    <?php else: ?>
        <div class="card">
            <h3><?= htmlspecialchars($post['name']) ?></h3>
            <p><?= nl2br(htmlspecialchars($post['description'])) ?></p>
            <p class="date">Дата: <?= $post['created_at'] ?></p>

            <a class="btn" href="post_check.php?id=<?= $post['id'] ?>">
                Посмотреть
            </a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
