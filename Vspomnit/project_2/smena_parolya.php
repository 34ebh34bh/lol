<?php

$token = $_GET["token"];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        form {
            background: #ffffff;
            padding: 30px 35px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 360px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            outline: none;
            margin-bottom: 18px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #2a5298;
            box-shadow: 0 0 0 2px rgba(42, 82, 152, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            background: #2a5298;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button:hover {
            background: #1e3c72;
        }

        button:active {
            transform: scale(0.97);
        }
    </style>
</head>

<!--Доделать его конценуиональнее -->
<body>
<form action="post_password_reset.php?token=<?= $token ?>" method="post">
    <input type="text" name="password" placeholder="Введите новый пароль"><br>
    <button type="submit">Изменить</button>
</form>
</body>
</html>