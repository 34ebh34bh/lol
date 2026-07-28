<?php
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
<a href="index.php">Назад</a>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="title"><br>
    <input type="text" name="description" placeholder="description"><br>
<!--    <input type="file" name="pic" placeholder="pic"><br>-->
    <button type="submit">Создать</button>
</form>
</body>
</html>

<?php
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     $user_id = $_GET["id"];
     $title = $_POST["title"] ?? '';
     $description = $_POST["description"] ?? '';
     $pic = 'edede';
     if ($user_id && $title && $description && $pic) {
         $smtm = $pdo->prepare("INSERT INTO projich.posts (user_id, title, description, pic) VALUES(?,?,?,?)");
         $smtm->execute([$user_id, $title, $description, $pic]);
     }
 }
?>