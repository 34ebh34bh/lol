<?php
require_once __DIR__ . '/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Папка для сохранения файлов (внутри public/)
    $uploadDir = __DIR__ . '/uploads/';

    // Если папки нет — создаём
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Имя файла и путь
    $fileName = basename($_FILES["description"]["name"]);
    $filePath = $uploadDir . $fileName; // физический путь на сервере

    // Имя, введённое пользователем
    $name = $_POST['name'] ?? '';

    // Перемещаем файл из временной папки в uploads/
    if (move_uploaded_file($_FILES["description"]["tmp_name"], $filePath)) {
        // Относительный путь для БД (без __DIR__)
        $imgPath = 'uploads/' . $fileName;

        // Сохраняем путь и описание в базу
        $stmt = $pdo->prepare("INSERT INTO crud.pictures (pic, description) VALUES (?, ?)");
        $stmt->execute([$imgPath, $name]);
    }

    header("Location:home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка картинки</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Описание"><br><br>
    <input type="file" name="description" required><br><br>
    <button type="submit">Загрузить</button>
</form>
</body>
</html>