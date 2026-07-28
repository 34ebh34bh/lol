<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = 'user';

    $n = trim($name);
    $e = trim($email);
    $p = trim($password);

    $name_result = preg_match('/^[а-яА-Яa-zA-Z0-9]+$/u', $n);
    $email_result = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $e);
    $password_result = preg_match('/^[a-zA-Z0-9]+$/', $p);

    $smtm = $pdo->prepare("SELECT email FROM crud_2.user WHERE email = ?");
    $smtm->execute([$e]);

    if (strlen($n) > 4 && strlen($n) < 8 && strlen($p) > 4 && strlen($p) < 8) {
        if ($name_result === 1) {
            if ($n === strip_tags($n) && $e === strip_tags($e)) { // -- Name
                if ($email_result === 1) {
                    if ($smtm->fetch() === false) {// ---email
                        if ($password_result === 1) {

                            $pass_hash = password_hash($p, PASSWORD_DEFAULT);
                            $smtm = $pdo->prepare("INSERT INTO crud_2.user (name, email, password, role) VALUES (?, ?, ?, ?)");
                            $smtm->execute([$n,$e,$pass_hash, $role]);
                            header("location:login.php");
                            exit();

                        }else{
                            echo 'Не корректные символы в пароле';
                        }
                    }else{
                        echo 'Такая почта уже занята';
                    }
                }else{
                    echo 'НЕ корректные символы в почте';
                }
            }else {
                echo 'Не корректные символы в имени или почте';
            }
        }else {
            echo 'НЕ корректная Имя';
        }
    }else{
        echo 'НЕ корректная длина';
    }
}
?>