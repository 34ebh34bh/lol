<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: white;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            width: 300px;
        }

        form input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.2s;
        }

        form input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 2px rgba(0,123,255,0.4);
        }

        form button {
            width: 100%;
            padding: 10px 12px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            cursor: pointer;
            transition: background 0.2s;
        }

        form button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
<a href="index.php">Home</a>
<form action="reg_create.php" method="post">
    <input type="text" name="name" placeholder="name"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">Enter</button>
</form>
</body>
</html>