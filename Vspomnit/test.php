<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="razgon.php">back</a><br>
</body>
</html>

<?php
'Имя'. print_r($_SESSION['name']). "<br>";
'Пароль'. print_r($_SESSION['password']). PHP_EOL;
?>