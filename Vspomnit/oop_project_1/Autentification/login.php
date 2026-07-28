<?php
require_once '../../../vendor/autoload.php';

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
    <title>Login</title>

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
            background: linear-gradient(135deg, #1d2671, #c33764);
        }

        form {
            background: #fff;
            padding: 35px 40px;
            border-radius: 14px;
            width: 100%;
            max-width: 360px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            text-align: center;
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
            border-color: #c33764;
            box-shadow: 0 0 0 2px rgba(195, 55, 100, 0.2);
        }

        button {
            width: 100%;
            padding: 14px;
            background: #c33764;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button:hover {
            background: #b02f58;
        }

        button:active {
            transform: scale(0.97);
        }

        label {
            display: block;
            margin-top: 16px;
            font-size: 14px;
            color: #555;
        }

        label a {
            color: #c33764;
            text-decoration: none;
            font-weight: bold;
            margin-left: 4px;
        }

        label a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form action="" method="post">
    <input type="text" name="name" placeholder="name"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">Ok</button>
    <label for="ll">
        Нету аккаунта?
        <a id="ll" href="registration.php">Зарегистрироваться</a>
    </label>
</form>

</body>
</html>
<?php
$email = $_POST['email'] ?? '';
$password = $_POST['$password'] ?? '';

$UserRepository = new UserRepository($pdo);
$AuthService = new AuthService($UserRepository);

$user = $AuthService->login($email,$password);
$_SESSION['user_id'] = $user->getId();

//header('Location: dashboard.php');
//exit();
?>