@extends('layouts.base')

@section('title', 'Legal Information')

@section('content')
    <div class="container">
        <h1>Legal Information</h1>

        <section class="legal-section">
            <h2>Terms of Service</h2>
            <p>
                These are the terms under which you may use our API services...
            </p>
            <ul>
                <li>Use the API responsibly.</li>
                <li>Do not abuse or overload the service.</li>
                <li>Respect intellectual property rights.</li>
                <li>Service may change or discontinue at any time.</li>
            </ul>
        </section>

        <hr>

        <section class="legal-section">
            <h2>Privacy Policy</h2>
            <p>
                We respect your privacy and handle your data carefully...
            </p>
            <ul>
                <li>We collect only necessary data (e.g., email, API usage stats).</li>
                <li>Your data is not shared with third parties without consent.</li>
                <li>We use standard security practices to protect data.</li>
                <li>You may request deletion of your data at any time.</li>
            </ul>
        </section>

    </div>
@endsection
