<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Donatur')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="navbar">
        <h1>Data Donatur</h1>
        <p>Pengelolaan profil dan data donatur</p>
    </div>

    @yield('content')
    
</body>
</html>