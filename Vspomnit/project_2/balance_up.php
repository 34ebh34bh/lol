<?php
include 'middleware/login.php';
include 'connection.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пополнение баланса</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }

        .container {
            max-width: 420px;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .row {
            display: flex;
            gap: 10px;
        }

        .row input {
            flex: 1;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #4f46e5;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }

        .hint {
            font-size: 12px;
            color: #777;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<a href="profile.php">Назад</a>

<div class="container">
    <div class="card">
        <h2>Пополнение карты</h2>

        <form action="create_pay.php" method="post">
            <label>Номер карты</label>
            <input type="text" name="number_cart" placeholder="XXXX XXXX XXXX XXXX" maxlength="16">

            <div class="row">
                <div>
                    <label>Месяц</label>
                    <input type="text" name="date_cart_m" placeholder="MM" maxlength="2">
                </div>
                <div>
                    <label>Год</label>
                    <input type="text" name="date_cart_y" placeholder="YY" maxlength="4">
                </div>
                <div>
                    <label>CVC</label>
                    <input type="password" name="cvv" placeholder="***" maxlength="3">
                </div>
            </div>

            <label>Имя владельца</label>
            <input type="text" name="name" placeholder="IVAN IVANOV">

            <label for="balance_id">Пополнить:
            <input id="balance_id" type="text" name="balance_id" placeholder="Сумма пополнения:">
            </label>

            <button type="submit">Пополнить</button>
        </form>

        <div class="hint">
            Данные карты не сохраняются
        </div>
    </div>
</div>

</body>
</html>
