<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'API Docs')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<header class="header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">API Platform</a>
        <nav class="nav">
            <a href="{{ route('docs.index') }}">Docs</a>
            <a href="{{ route('changelog') }}">Changelog</a>
            <a href="{{ route('legal') }}">Legal</a>
        </nav>
    </div>
</header>

<main class="main">
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        &copy; {{ date('Y') }} API Platform. All rights reserved.
    </div>
</footer>

@stack('scripts')
</body>
</html>
