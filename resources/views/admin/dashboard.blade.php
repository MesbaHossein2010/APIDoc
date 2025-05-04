@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="admin-header">
        <h1>Welcome back, Admin!</h1>
        <p class="text-muted">Here's a quick overview of your content.</p>
    </div>

    <div class="dashboard-grid">
        <!-- Stats Cards -->
        <div class="stat-card">
            <h3>Total Documents</h3>
            <p>24</p>
        </div>
        <div class="stat-card">
            <h3>Sections</h3>
            <p>5</p>
        </div>
    </div>
@endsection
