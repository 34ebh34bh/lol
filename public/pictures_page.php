<?php
require_once __DIR__ . '/connect.php';

$stmt = $pdo->query("SELECT * FROM crud.pictures ORDER BY id DESC");
$pictures = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 20px;
        }
        .pic {
            background: white;
            padding: 10px;
            margin: 10px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        img {
            max-width: 200px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<h1>Загруженные картинки</h1>

<?php if (empty($pictures)): ?>
    <p>Нет загруженных изображений.</p>
<?php else: ?>
    <?php foreach ($pictures as $picture): ?>
        <div class="pic">
            <img src="<?= htmlspecialchars($picture['pic']) ?>" alt="img"><br>
            <p><?= htmlspecialchars($picture['description']) ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>