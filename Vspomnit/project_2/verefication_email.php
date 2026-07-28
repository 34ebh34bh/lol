<?php
include 'middleware/login.php';
include 'middleware/email_check.php';
require 'C:/OSPanel/home/ProjVperedIbexSomnenii/App/service/MailService.php';


include 'connection.php';
session_start();

$MailService = new Mailservice();

$email = $_SESSION['email'];
$id = $_SESSION['id'];
$code = random_int(100000, 999999);

$smtm = $pdo->prepare("UPDATE crud_2.user SET verefication_code = ? WHERE id = ?");
$smtm->execute([$code, $id]);
$MailService->send(
        'testMail@gmail.ru',
        'Подтверждения почты.',
        "Код подтверждения: $code"
);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подтверждение почты</title>
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
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .email {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            text-align: center;
            letter-spacing: 4px;
        }

        button {
            width: 100%;
            margin-top: 15px;
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
            margin-top: 15px;
        }
    </style>
</head>
<body>

<a href="index.php">Home</a>

<div class="container">
    <div class="card">
        <h2>Подтверждение почты</h2>

        <div class="email">
            Код отправлен на <strong><?= htmlspecialchars($email) ?></strong>
        </div>

        <form action="check_email.php" method="post">
            <input type="text" name="code_post" placeholder="Введите код">

            <button type="submit">Подтвердить</button>
        </form>

        <div class="hint">
            Если письмо не пришло, проверьте папку «Спам»
        </div>
    </div>
</div>

</body>
</html>
