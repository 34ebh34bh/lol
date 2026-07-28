<?php
session_start();
include './connection.php';

$n  = $_SESSION['name'] ?? '';
$r  = $_SESSION['role'] ?? '';
$id = $_SESSION['id'] ?? '';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f4f6fb;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .nav {
            background: #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #4f7cff;
            font-weight: 500;
        }

        .nav a:hover {
            text-decoration: underline;
        }

        .notes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .note {
            background: #ffffff;
            padding: 18px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .note h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .note p {
            margin: 6px 0;
            font-size: 14px;
            color: #555;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #e6edff;
            color: #4f7cff;
            margin-top: 8px;
        }

        .date {
            margin-top: 10px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
<!--wede232-->
<div class="container">

    <div class="nav">
        <?php if ($n === ''): ?>
            <a href="./register.php">Зарегистрироваться</a>
            <a href="./login.php">Войти</a>
        <?php else: ?>
            <a href="./profile.php?id=<?= $id ?>"><?= htmlspecialchars($n) ?></a>
            <a href="./create_noye.php">Создать</a>
            <a href="./buy_role.php">Купить права</a>
            <a href="./logout.php">Выйти</a>
        <?php endif; ?>

        <?php
        if ($r === 'moderator'){
            echo "<a href='./moderator_check.php'>Запросы</a>";
        }
        ?>

    </div>

    <div class="notes">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM crud_2.test_note_2 WHERE flag='approved'");
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note):
            ?>
            <div class="note">
                <h3><?= htmlspecialchars($note['name']) ?></h3>
                <p><?= htmlspecialchars($note['description']) ?></p>
                <span class="badge"><?= htmlspecialchars($note['flag']) ?></span>
                <div class="date"><?= htmlspecialchars($note['created_at']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

</body>
</html>
