<?php
include 'middleware/login.php';
//include 'middleware/middleware_chekmoder.php';
include 'connection.php';

$smtm = $pdo->prepare("SELECT * FROM crud_2.roles WHERE is_active = 1");
$smtm->execute();
$roles = $smtm->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Покупка прав</title>

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

        .back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #4f7cff;
            font-size: 14px;
        }

        h3 {
            margin: 10px 0 25px;
            font-size: 22px;
        }

        .options a {
            display: block;
            padding: 14px;
            margin-bottom: 12px;
            border-radius: 10px;
            background: #4f7cff;
            color: #fff;
            text-decoration: none;
            font-size: 15px;
            transition: background 0.25s, transform 0.15s;
        }

        .options a:hover {
            background: #385ed6;
            transform: translateY(-2px);
        }

        .options a:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <a class="back" href="index.php">← Home</a>
        <h3>Купить права: moderator</h3>
        <div class="options">
            <?php
            foreach ($roles as $role) {
                $id = $role['id'];
                echo 'Роль: ' .$role['name'] . "<br>";
                echo 'Цена: ' .$role['price'] . "<br>";
                echo 'Активна: ' .$role['is_active'] . "<br>";
                echo 'Дней: ' .$role['duration_days'] . "<br>";
                echo "<a href=buy_role/role_buy_user.php?id={$id}>Купить</a>";
            }
            ?>
        </div>

    </div>
</div>

</body>
</html>


