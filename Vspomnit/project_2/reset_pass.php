<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Email search</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: #ffffff;
            padding: 32px;
            width: 100%;
            max-width: 380px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card h1 {
            margin: 0 0 20px;
            text-align: center;
            font-size: 22px;
            color: #333;
        }

        .card input {
            width: 100%;
            padding: 12px 14px;
            font-size: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 16px;
            outline: none;
            transition: border-color 0.2s;
        }

        .card input:focus {
            border-color: #667eea;
        }

        .card button {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            background: #667eea;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        .card button:hover {
            background: #5a67d8;
        }

        .card button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Find email</h1>

    <form action="serch_email_in_db.php" method="post">
        <input
                type="text"
                name="email"
                placeholder="Enter your email"
                required
        >
        <button type="submit">OK</button>
    </form>
</div>

</body>
</html>
