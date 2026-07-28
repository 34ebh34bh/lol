<?php
require_once __DIR__ . '/../public/connect.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("❌ Не передан ID задачи");
}

// Получаем задачу из базы
$stmt = $pdo->prepare("SELECT * FROM crud.toodoo WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    die("⚠️ Задача с ID {$id} не найдена");
}

// Определяем статус
$status = $task['compleated_at'] == 1 ? '✅ Выполнено' : '❌ Не выполнено';

$stmt = $pdo->prepare('SELECT * FROM crud.toodoo WHERE id = ?');
$stmt->execute([$id]);
$prio = $stmt->fetch(PDO::FETCH_ASSOC);
//$stmt = $pdo->
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр задачи</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .task-card {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            background-color: #f9f9f9;
        }
        .task-card h2 {
            margin-top: 0;
            color: #333;
        }
        .task-card p {
            margin: 8px 0;
        }
        .back-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 6px 12px;
            border-radius: 4px;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="task-card">
    <h2><?= htmlspecialchars($task['name']) ?></h2>
    <p><b>Описание:</b> <?= htmlspecialchars($task['description']) ?></p>
    <p><b>Статус:</b> <?= $status ?></p>
    <p><b>Приоритет:</b> <?= $prio['prioritet'] ?></p>

    <a class="back-link" href="home.php">⬅ Назад</a>
    <a class="back-link" href="comp.php?id=<?=$id?>">Выполнить</a>
    <a class="back-link" href="delete.php?id=<?=$id?>">Удалить</a>
    <a class="back-link" href="update.php?id=<?=$id?>">Обновить</a>
</div>
</body>
</html>