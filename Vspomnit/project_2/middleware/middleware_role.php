<?php
session_start();
if ($_SESSION['role'] !== "moderator") {
    header('Location:index.php');
    exit();
}
?>