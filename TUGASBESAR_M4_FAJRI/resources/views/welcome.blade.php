<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Crowdfunding</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            background: white;
            padding: 60px 40px;
            border-radius: 15px;
            width: 90%;
            max-width: 550px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #2563eb;
            font-size: 32px;
            margin-bottom: 15px;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: bold;
        }

        .donatur {
            background: #2563eb;
            color: white;
        }

        .admin {
            background: white;
            color: #2563eb;
            border: 2px solid #2563eb;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Sistem Crowdfunding</h1>

        <p>
            Selamat datang di Sistem Crowdfunding.
            Mari bersama-sama mendukung kegiatan sosial
            melalui donasi.
        </p>

        <div class="buttons">
            <a href="{{ route('donatur.create') }}" class="btn donatur">
                Isi Data Donatur
            </a>

            <a href="{{ route('login') }}" class="btn admin">
                Login Admin
            </a>
        </div>
    </div>

</body>
</html>