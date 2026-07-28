<?php
require_once __DIR__ . '/../public/connect.php';
$smtm = $pdo->prepare("SELECT * FROM crud.prioritet");
$smtm->execute();
$prioritet = $smtm->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Создать задачу</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"], input[type="hidden"] {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Создать задачу</h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Название задачи" required>
        <input type="text" name="description" placeholder="Описание задачи" required>
<!--        <input type="text" name="prioritet" placeholder="prioritet" required>-->
        <select name="prioritet" id="">
            <?php foreach ($prioritet as $p): ?>
                <option value="<?= $p['prioritet'] ?>"><?= $p['prioritet'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Создать</button>
    </form>
</div>
<br>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $compleated_at = 0;
    $pri = $_POST["prioritet"]; // получаем выбранный приоритет

    if ($name && $description) {
        $smtm = $pdo->prepare(
            "INSERT INTO crud.toodoo (name, description, compleated_at, prioritet) VALUES (?,?,?,?)"
        );
        $smtm->execute([$name, $description, $compleated_at, $pri]);
        header('Location:home.php');
        exit();
    }
}
?>