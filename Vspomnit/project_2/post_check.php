<?php
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'connection.php';

$id = $_GET['id'] ?? null;

$smtm = $pdo->prepare("SELECT * FROM crud_2.test_note_2 WHERE id = ?");
$smtm->execute([$id]);
$post = $smtm->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo 'Пост не найден';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $flag = $_POST['flaggg'] ?? null;

    if ($flag) {
        $upd = $pdo->prepare("UPDATE crud_2.test_note_2 SET flag = ? WHERE id = ?");
        $upd->execute([$flag, $id]);
        header("Location: moderator_post_check.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Проверка поста</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
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
        }

        .meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        button {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .approve {
            background: #22c55e;
            color: #fff;
        }

        .reject {
            background: #ef4444;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <a class="back" href="moderator_post_check.php">← Назад</a>

    <div class="card">
        <h3><?= htmlspecialchars($post['name']) ?></h3>

        <p><?= nl2br(htmlspecialchars($post['description'])) ?></p>

        <div class="meta">
            Приоритет: <?= $post['prioritet'] ?> (<?= $post['prioritet_level'] ?>)<br>
            Дата: <?= $post['created_at'] ?>
        </div>

        <form method="post" class="actions">
            <button class="approve" type="submit" name="flaggg" value="approved">
                Принять
            </button>

            <button class="reject" type="submit" name="flaggg" value="rejected">
                Отклонить
            </button>
        </form>
    </div>
</div>

</body>
</html>
