<?php
require_once __DIR__ . '/../public/connect.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("<h2 style='color: red; text-align: center;'>❌ Ошибка: не указан ID пользователя</h2>");
}

$smtm = $pdo->prepare("SELECT * FROM crud.users WHERE id = ?");
$smtm->execute([$id]);
$user = $smtm->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("<h2 style='color: red; text-align: center;'>🚫 Пользователь не найден</h2>");
}
?>

<?php
// Получаем все задачи пользователя
$stmt = $pdo->prepare("SELECT * FROM crud.toodoo WHERE user_id = ?");
$stmt->execute([$id]);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);// а тут нам надо вывечти все посты

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-card {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        .profile-card h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .profile-info {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="profile-card">
    <h2>👤 Профиль пользователя</h2>
    <div class="profile-info"><strong>Имя:</strong> <?= htmlspecialchars($user['name']) ?></div>
    <div class="profile-info"><strong>Почта:</strong> <?= htmlspecialchars($user['email']) ?></div>
    <a href="home.php" class="btn-back">⬅ Назад</a>

    <h2>Мои посты: </h2>
    <?php
    $total = 0; // количество всех записей
    $completed = 0; // соличество выполненых
    $notCompleted = 0; // количество не выполненых

    foreach ($tasks as $task) {
        $total++; // увеличиваем общее количество всегда

        if ($task['compleated_at'] == 1) { // если выполнен то прибовляем
            $completed++;
        } else { // не выполнил или что то другое то выполняем дургое
            $notCompleted++;
        }
    }

    echo 'Всего заданий: ' . $total . "<br>";
    echo 'Выполненных заданий: ' . $completed . "<br>";
    echo 'Невыполненных заданий: ' . $notCompleted . "<br>";
    ?>
</div>
</body>
</html>