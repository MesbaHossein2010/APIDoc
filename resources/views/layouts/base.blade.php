<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'API Docs')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="dark">
<main class="main">
    @yield('content')
</main>
@stack('scripts')
</body>
</html>
