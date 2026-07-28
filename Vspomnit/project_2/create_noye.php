<?php
include './connection.php';
include 'middleware/login.php';

//$smtm = $pdo->prepare("SELECT * FROM crud_2.flag");
//$smtm->execute();
//$flags = $smtm->fetchAll(PDO::FETCH_ASSOC);
//foreach ($flags as $flag) {
//    echo $flag['flag_name'];
//}

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
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #6a5acd;
            box-shadow: 0 0 5px rgba(106, 90, 205, 0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #6a5acd;
            color: white;
            transition: 0.2s;
        }

        button:hover {
            background: #5949c6;
        }
    </style>
</head>
<body>

<a href="index.php">Главная</a><br>

<form action="create.php" method="post">
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="description" placeholder="description"><br>
    <input type="number" name="prioritet" min="1" max="5" placeholder="prioritet"><br>
    <button type="submit">enter</button>
</form>
</body>
</html>

