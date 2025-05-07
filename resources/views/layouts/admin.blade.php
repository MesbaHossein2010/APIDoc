<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Fonts (optional) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Admin CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @stack('styles')
</head>
<body class="admin">

<div class="admin-container">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <div class="sidebar-top">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.docs.index') }}" class="{{ request()->routeIs('admin.docs.*') ? 'active' : '' }}">Documents</a>
                <a href="{{ route('admin.sections.index') }}" class="{{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">Sections</a>
                <a href="{{ url('/') }}" target="_blank">View Site</a>
            </nav>
        </div>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-secondary logout-btn">Logout</button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="admin-main">
        <div class="admin-content">
            @yield('content')
        </div>
    </main>

</div>

@stack('scripts')
</body>
</html>
