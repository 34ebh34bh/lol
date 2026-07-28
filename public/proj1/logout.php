<?php
session_start();
session_destroy();
header("location:create_noye.php");
exit();
?>