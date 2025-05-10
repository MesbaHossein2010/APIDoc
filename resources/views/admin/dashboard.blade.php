@extends('layouts.admin')

@section('title', 'Dashboard')

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
    }
</style>
@section('content')
    <div class="dashboard-header">
        <h1 class="dashboard-title">Welcome back, Admin!</h1>
        <p class="dashboard-subtitle">Here's a quick overview of your content.</p>
    </div>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <h3 class="card-title">Total Documents</h3>
            <p class="card-value">{{ $DocsNum }}</p>
        </div>
        <div class="dashboard-card">
            <h3 class="card-title">Sections</h3>
            <p class="card-value">{{ $SectionsNum }}</p>
        </div>
    </div>
@endsection
