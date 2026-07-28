<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4f7cff, #6dd5fa);
            font-family: Arial, sans-serif;
        }

        .card {
            background: white;
            padding: 30px 35px;
            width: 320px;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 22px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 15px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: 0.25s border-color, 0.25s box-shadow;
        }

        input:focus {
            border-color: #4f7cff;
            box-shadow: 0 0 4px rgba(79,124,255,0.35);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px 14px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            background: #4f7cff;
            color: white;
            cursor: pointer;
            transition: background 0.25s;
        }

        button:hover {
            background: #385ed6;
        }
    </style>
</head>
<body>
<a href="register.php">Регистрация</a>
<div class="card">
    <h2>Login</h2>
    <form action="create_login.php" method="post">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Enter</button>
        <br>
        <a href="reset_pass.php">Забыли пароль?</a>
    </form>
</div>

</body>
</html>