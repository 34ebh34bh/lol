<?php require_once __DIR__ . '/../public/connect.php';
session_start();

if (isset($_SESSION['email'])) {
    header('Location:home.php');
    exit();
}
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
    <form action="" method="post">
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="password" placeholder="password"><br>
        <button type="submit">Login</button><br>
        <a href="rigestration.php">Если у вас нет аккаунта</a><br>
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email && $password) {

        $smtm = $pdo->prepare("SELECT * FROM crud.users WHERE email = ?");
        $smtm->execute([$email]);
        $user = $smtm->fetch(PDO::FETCH_ASSOC);
        if ($user && $user['password'] == $password) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            header('Location:home.php');
            exit();
        }else {
            echo "Неверный email или пароль!";
        }
    }
}
?>