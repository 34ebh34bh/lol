<?php
session_start();
if ($_SESSION['role'] === 'moderator') {
    echo 'Ваша роль и так модератор';
    header('location:/Vspomnit/project_2/index.php');
    exit();
}
