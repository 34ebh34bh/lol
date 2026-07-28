<?php
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .links {
            background: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .username {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }
    </style>
</head>
<body>

<div class="links">
    <?php
    $id = $_SESSION['id'];
    if (isset($_SESSION['email'])): ?>
        <span class="username">👤 <?php echo htmlspecialchars($_SESSION['name']); ?></span>
        <a href='create.php?id=<?=$id?>'>Создать пост</a>
        <a href="profile.php">Профиль</a>
        <a href="logout.php">Выйти</a>
    <?php else: ?>
        <a href="register.php">Зарегистрироваться</a>
        <a href="login.php">Войти</a>
    <?php endif; ?>
</div>

</body>
</html>