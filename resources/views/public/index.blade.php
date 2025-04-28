@extends('layouts.base')

@section('title', 'Welcome to API Platform')

@section('content')
    <section class="hero">
        <div class="container">
            <h1>Welcome to Our API Platform</h1>
            <p>Discover our powerful API for your apps and services.</p>
            <a href="{{ route('docs.index') }}" class="btn-primary">Explore Docs</a>
        </div>
    </section>
@endsection
