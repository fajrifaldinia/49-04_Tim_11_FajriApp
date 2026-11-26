<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Crowdfunding') }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            background: #f4f5f7;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 25px 16px;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 22px;
            color: #333;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .auth-card h2 {
            margin: 0 0 8px;
            font-size: 22px;
            font-weight: 600;
        }

        .auth-card p {
            font-size: 14px;
            line-height: 1.5;
        }

        .auth-card label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .auth-card input:not([type="checkbox"]) {
            display: block;
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .auth-card input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .auth-card form > div {
            margin-top: 18px;
        }

        .auth-card input[type="checkbox"] {
            margin-right: 6px;
        }

        .auth-card button {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .auth-card a {
            color: #2563eb;
            font-size: 13px;
        }

        .auth-card button:hover {
            background: #1d4ed8;
        }

        .auth-card [class*="text-red-600"] {
            color: #dc2626;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .auth-card {
                padding: 24px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="brand">Sistem Crowdfunding</div>

        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
