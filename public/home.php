<?php
require_once __DIR__ . '/../public/connect.php';
session_start();
if (!isset($_SESSION['email'])){
    echo 'сначало надо войти';
}
// Получаем все записи из таблицы
$stmt = $pdo->prepare("SELECT * FROM crud.users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user) {
    $ids = $user['id'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .task {
            background: #fff;
            padding: 15px 20px;
            margin: 15px auto;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            max-width: 500px;
        }
        .task h2 {
            margin: 0 0 10px;
            color: #007bff;
        }
        .task p {
            margin: 4px 0;
            color: #444;
        }
        .status {
            font-weight: bold;
        }
        .done {
            color: green;
        }
        .pending {
            color: red;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745; /* зелёная кнопка */
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838; /* тёмно-зелёная при наведении */
        }
    </style>
</head>
<body>
<?php
$email = $_SESSION['email'];
if (isset($_SESSION['email'])){
    echo "<a href='logout.php'>Выйти</a>" . "\n";
    echo "<a href='create.php'>Создать</a>" . "\n";
    echo "<a href='create_pic.php'>Добавить картинку</a>" . "\n";
    echo "<a href='pictures_page.php'>Посмотреть картинку</a>" . "\n";
    echo "<a href='profile.php?id={$ids}'>$email</a>" . "\n";
} elseif(!isset($_SESSION['email'])) {
    echo "<a href='rigestration.php'>Создать</a>";
    echo "<a href='login.php'>Создать</a>";
}
?>
<h1>📝 Список задач</h1>
<h2> Фильтр </h2>
<form action="" method="get">
    <input type="text" name="name" placeholder="Введите название..."><br>
    <button type="submit">Найти</button>
    <br>
</form>
<?php
$stmt = $pdo->prepare("SELECT * FROM crud.prioritet");
$stmt->execute();
$prioritets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="" method="get">
    <select name="prioritet" id="">
        <?php
        foreach ($prioritets as $prioritet) {
            echo "<option value='{$prioritet['prioritet']}'>{$prioritet['prioritet']}</option>";
        }
        ?>
    </select>
    <button type="submit">Найти</button>
    <br>
</form>
<?php

$pr = $_GET['prioritet'] ?? '';
$name = $_GET['name'] ?? '';

$sql = "SELECT * FROM crud.toodoo WHERE 1=1";
$params = [];

// Если выбран приоритет — добавляем фильтр
if (!empty($pr)) {
    $sql .= " AND prioritet LIKE ?";
    $params[] = "%$pr%";
}

// Если введено имя — добавляем фильтр
if (!empty($name)) {
    $sql .= " AND name LIKE ?";
    $params[] = "%$name%";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (empty($tasks)): ?>
    <p style="text-align:center;">Нет задач</p>
<?php else: ?>
    <?php foreach ($tasks as $task): ?>
        <?php
        $id = $task['id'];
        $isDone = $task['compleated_at'] == 1;
        $statusText = $isDone ? 'Выполнено' : 'Не выполнено';
        $statusClass = $isDone ? 'done' : 'pending';
        ?>
        <div class="task">
            <h2><?= htmlspecialchars($task['name']) ?></h2>
            <p><?= htmlspecialchars($task['description']) ?></p>
            <p class="status <?= $statusClass ?>">Статус: <?= $statusText ?></p>
            <a href="show.php?id=<?=$id?>">Посмотреть</a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>