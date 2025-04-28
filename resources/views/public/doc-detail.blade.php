@extends('layouts.base')

@section('title', 'Documentation Detail')

@section('content')
    <div class="container">
        <h1>Authentication</h1>
        <p>Here’s how you authenticate with our API...</p>

        <h3>Step-by-Step</h3>
        <ul>
            <li>Get your API Key</li>
            <li>Send it via Authorization Header</li>
            <li>Handle Token Expiry</li>
        </ul>

        <pre><code>
curl https://api.example.com/v1/auth
-H "Authorization: Bearer YOUR_API_KEY"
    </code></pre>
    </div>
@endsection
