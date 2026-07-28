<?php
require_once __DIR__ . '/../public/connect.php';

$id = $_GET['id'];
$smtm = $pdo->prepare("SELECT * FROM crud.toodoo WHERE id = ?");
$smtm->execute([$id]);
$proj = $smtm->fetch(PDO::FETCH_ASSOC);
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
        <input type="text" name="name" value="<?=$proj['name']?>" placeholder="name"><br>
        <input type="text" name="description" value="<?=$proj['description']?>" placeholder="description"><br>
        <button type="submit">Редактировать</button>
        <br>
    </form>
    </body>
    </html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    if ($name && $description) {
        $smtm = $pdo->prepare("UPDATE crud.toodoo SET name=?,description=?, compleated_at=0 WHERE id = ?");
        $smtm->execute([$name,$description,$id]);
        header("Location:home.php");
        exit();
    }
}
?>