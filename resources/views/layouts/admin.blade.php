<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'پنل مدیریت')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Persian Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">

    {{-- Admin RTL CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin">

<div class="admin-container">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <div class="sidebar-top">
            <div class="sidebar-header">
                <h2>پنل مدیریت</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">داشبورد</a>
                <a href="{{ route('admin.docs.index') }}" class="{{ request()->routeIs('admin.docs.*') ? 'active' : '' }}">مستندات</a>
                <a href="{{ route('admin.sections.index') }}" class="{{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">بخش‌ها</a>
                <a href="{{ url('/') }}" target="_blank">مشاهده سایت</a>
            </nav>
        </div>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-secondary logout-btn">خروج</button>
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
