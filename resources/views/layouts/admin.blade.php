<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="admin">
<!-- Admin Sidebar -->
<aside class="admin-sidebar">
    <div class="sidebar-header">
        <h2>Admin Panel</h2>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="active"><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/docs">Documents</a></li>
            <li><a href="/admin/sections">Sections</a></li>
            <li><a href="/">View Site</a></li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<main class="admin-main">
    <div class="admin-content">
        @yield('content')
    </div>
</main>

@stack('scripts')
</body>
</html>
