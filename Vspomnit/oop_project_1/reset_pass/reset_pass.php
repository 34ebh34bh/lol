<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #141e30, #243b55);
        }

        form {
            background: #ffffff;
            padding: 35px 40px;
            border-radius: 14px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 360px;
            text-align: center;
        }

        h3 {
            margin: 0 0 25px;
            font-size: 22px;
            color: #243b55;
        }

        button {
            width: 100%;
            padding: 14px;
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            opacity: 0.95;
        }

        button:active {
            transform: scale(0.97);
        }
    </style>
</head>
<body>
<form action="" method="post">
    <h3>Востановить пароль</h3>
    <button type="submit">Забыл Пароль</button>
</form>
</body>
</html>
