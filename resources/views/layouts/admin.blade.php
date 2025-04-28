<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <a href="{{ route('admin.dashboard') }}">API Admin</a>
        </div>

        <ul class="admin-menu">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.docs.list') }}">Docs</a></li>
            <li><a href="{{ route('admin.sections') }}">Sections</a></li>
            <li><a href="{{ route('admin.changelog') }}">Changelog</a></li>
            <li><a href="{{ route('admin.profile') }}">Profile</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="admin-main">
        <header class="admin-header">
            <h1>@yield('title')</h1>
        </header>

        <main class="admin-content">
            @yield('content')
        </main>
    </div>

</div>
</body>
</html>
