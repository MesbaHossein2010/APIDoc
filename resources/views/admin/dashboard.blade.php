@extends('layouts.admin')

@section('title', 'داشبورد')

<style>
    .dashboard-header {
        margin-bottom: 2rem;
    }

    .dashboard-title {
        font-size: 2rem;
        color: #e0e0e0;
        margin-bottom: 0.5rem;
    }

    .dashboard-subtitle {
        color: #a0a0a0;
        font-size: 1rem;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }

    .dashboard-card {
        background-color: #1f1f1f;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        transition: transform 0.2s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
    }

    .card-title {
        color: #bbbbbb;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .card-value {
        font-size: 1.8rem;
        color: #ffffff;
        font-weight: bold;
        font-family: 'IranSans', 'Segoe UI', Tahoma, sans-serif;
        direction: ltr;
        display: inline-block;
    }

    .card-value::after {
        content: attr(data-en-value);
        display: none;
    }
</style>

@section('content')
    <div class="dashboard-header">
        <h1 class="dashboard-title">خوش آمدید،</h1>
        <p class="dashboard-subtitle">در یک نگاه کلی می‌توانید محتوای خود را بررسی کنید.</p>
    </div>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <h3 class="card-title">تعداد مستندات</h3>
            <p class="card-value" data-en-value="{{ $DocsNum }}">{{ to_persian_num($DocsNum) }}</p>
        </div>
        <div class="dashboard-card">
            <h3 class="card-title">تعداد بخش‌ها</h3>
            <p class="card-value" data-en-value="{{ $SectionsNum }}">{{ to_persian_num($SectionsNum) }}</p>
        </div>
    </div>
@endsection
