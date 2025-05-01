@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-grid">
        <!-- Stats Cards -->
        <div class="stat-card">
            <h3>Total Documents</h3>
            <p>24</p>
        </div>
        <div class="stat-card">
            <h3>Published</h3>
            <p>18</p>
        </div>
        <div class="stat-card">
            <h3>Drafts</h3>
            <p>6</p>
        </div>
        <div class="stat-card">
            <h3>Sections</h3>
            <p>5</p>
        </div>
    </div>
@endsection
