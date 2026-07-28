<?php require_once __DIR__ . '/../public/connect.php';?>

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
<form action="" method="post">
    <input type="text" name="name" placeholder="name"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">Зарегистрироваться</button>
    <br>
</form>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($name&& $email&& $password) {
        $smtm = $pdo->prepare("INSERT INTO crud.users (name, email, password) VALUES (?, ?, ?)");
        $smtm->execute([$name, $email, $password]);
        header("location:login.php");
        exit();
    }
}

?>