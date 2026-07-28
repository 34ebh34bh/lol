<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .nice-form {
            width: 320px;
            margin: 40px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            font-family: "Segoe UI", sans-serif;
        }

        .nice-form h3 {
            margin-bottom: 15px;
            font-weight: 600;
            text-align: center;
        }

        .nice-form input,
        .nice-form textarea,
        .nice-form button {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 12px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: .2s;
        }

        .nice-form input:focus,
        .nice-form textarea:focus {
            border-color: #5a8bff;
            box-shadow: 0 0 0 3px rgba(90,139,255,0.2);
        }

        .nice-form button {
            background: #5a8bff;
            border: none;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .nice-form button:hover {
            background: #4a78e0;
        }
    </style>
</head>
<body>
<a href="index.php">index</a>
<form action="create.php" method="post" class="nice-form">
    <h3>Добавить задачу</h3>
    <input type="text" name="name" placeholder="Название" >
    <textarea name="description" rows="6" placeholder="Описание"></textarea>
    <input type="number" name="prioritet" value="1" min="1" ">
    <button type="submit">Сохранить</button>
</form>
</body>
</html>
