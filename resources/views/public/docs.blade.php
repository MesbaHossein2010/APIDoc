@extends('layouts.base')

@section('title', 'Documentation')

@section('content')
    <div class="docs-layout container">
        <aside class="sidebar">
            <ul>
                <li><a href="#">Authentication</a></li>
                <li><a href="#">Endpoints</a></li>
                <li><a href="#">Errors</a></li>
                <li><a href="#">Examples</a></li>
            </ul>
        </aside>
        <section class="docs-content">
            <h2>Welcome to the Documentation</h2>
            <p>Select a topic from the sidebar to get started.</p>
        </section>
    </div>
@endsection
