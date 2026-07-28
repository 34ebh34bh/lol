<?php
include 'middleware/login.php';
include 'middleware/middleware_role.php';
include 'middleware/middleware_check_time_role.php';
require 'C:/OSPanel/home/ProjVperedIbexSomnenii/Vspomnit/project_2/middleware/middleware_check_time_role.php';

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель модератора</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f6fb;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 420px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 22px;
        }

        .actions a {
            display: block;
            padding: 14px;
            margin-bottom: 12px;
            border-radius: 10px;
            background: #4f7cff;
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            transition: background 0.25s, transform 0.15s;
        }

        .actions a:hover {
            background: #385ed6;
            transform: translateY(-2px);
        }

        .actions a:last-child {
            margin-bottom: 0;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #4f7cff;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">

        <a class="back" href="index.php">← Home</a>

        <h2>Панель модератора</h2>

        <div class="actions">
            <a href="moderator_post_check.php">Пропустить пост</a>
            <a href="moderator_balance_check.php">Одобрить пополнение</a>
        </div>

    </div>
</div>

</body>
</html>