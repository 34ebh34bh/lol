<?php
session_start();

if (isset($_SESSION['email'])) {
    header('location: create_noye.php');
    exit();
}

require_once __DIR__ . '/connect.php';
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
    <button type="submit">Войти</button><br>
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($email && $password) {
        $smtm = $pdo->prepare("SELECT * FROM projich.users WHERE email = ?");
        $smtm->execute([$email]);
        $user = $smtm->fetch(PDO::FETCH_ASSOC);
        if ($user && $user['password'] === $password) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            header('Location:create_noye.php');
            exit();
        } else {
            echo "<h3 style='color: red'>Неверная почта или пароль</h3>";
        }
    }
}
?>
