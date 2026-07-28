<?php
include 'middleware/login.php';

session_start();
session_destroy();
header("location:index.php");
exit();
?>