<?php
session_start();

if (isset($_SESSION['email'])) {
    header('location:create_noye.php');
    exit();
}

require_once __DIR__ . '/connect.php';

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 🔒 Простая валидация
    if (!$name || !$email || !$password) {
        $errors[] = "Все поля обязательны для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный email.";
    } else {
        // Проверяем, нет ли такого email
        $check = $pdo->prepare("SELECT id FROM projich.users WHERE email = ?");
        $check->execute([$email]);
        if ($check->fetch()) {
            $errors[] = "Пользователь с таким email уже существует.";
        } else {
            // Хешируем пароль


            $stmt = $pdo->prepare("INSERT INTO projich.users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hash]);

            $success = true;
            header("Location: login.php");
            exit();
        }
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        button {
            width: 100%;
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 13px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Регистрация</h2>

    <?php if ($errors): ?>
        <div class="error">
            <?= implode("<br>", array_map('htmlspecialchars', $errors)); ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="name" placeholder="Имя" value="<?= htmlspecialchars($name ?? '') ?>">
        <input type="text" name="email" placeholder="Email" value="<?= htmlspecialchars($email ?? '') ?>">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>

</body>
</html>