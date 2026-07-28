<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use Vspomnit\oop_project_1\Autentification\AuthService;
use Vspomnit\oop_project_1\Autentification\UserRepository;

$pass = 'egq34ggwegFA';
$pdo = new PDO('mysql:host=localhost;dbname=resset_password', 'root', $pass);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        form {
            background: #fff;
            padding: 35px 40px;
            border-radius: 14px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 360px;
            text-align: center;
        }

        h3 {
            margin-bottom: 25px;
            font-size: 22px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
        }

        button {
            width: 100%;
            padding: 14px;
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            background: #667eea;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button:hover {
            background: #5a67d8;
        }

        button:active {
            transform: scale(0.97);
        }
    </style>
</head>
<body>
<form action="" method="post">
    <h3>Регистрация</h3>
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">ок</button><br>
    <br>
    <label for="l">Есть уже аккаунт?<br>
        <a id="l" href="login.php">Войти</a><br>
    </label>
</form>
</body>
</html>
<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$UserRepository = new UserRepository($pdo); // тут класс просто ждёт подключение к бд
$AuthService = new AuthService($UserRepository); // этот же класс зависит от $AuthService и его обтекь надо сунуть

$user = $AuthService->register($email, $password);

$_SESSION['user_id'] = $user->getId();

//header("Location: login.php");
//exit();
?>