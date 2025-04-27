<!-- resources/views/api-documentation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>API Documentation</title>
</head>
<body>
<div class="container">
    <header>
        <h1>API Documentation</h1>
        <p>Your guide to using our APIs.</p>
    </header>

    <nav>
        <ul>
            <li><a href="#overview">Overview</a></li>
            <li><a href="#authentication">Authentication</a></li>
            <li><a href="#endpoints">Endpoints</a></li>
            <li><a href="#error-handling">Error Handling</a></li>
            <li><a href="#faq">FAQ</a></li>
        </ul>
    </nav>

    <main>
        <section id="overview">
            <h2>Overview</h2>
            <p>Information about the API.</p>
        </section>

        <section id="authentication">
            <h2>Authentication</h2>
            <p>Details on how to authenticate with the API.</p>
        </section>

        <section id="endpoints">
            <h2>Endpoints</h2>
            <ul>
                <li><strong>GET /api/v1/resource</strong> - Fetches a resource.</li>
                <li><strong>POST /api/v1/resource</strong> - Creates a new resource.</li>
                <!-- Add more API endpoints as necessary -->
            </ul>
        </section>

        <section id="error-handling">
            <h2>Error Handling</h2>
            <p>Information on how to handle errors.</p>
        </section>

        <section id="faq">
            <h2>FAQ</h2>
            <p>Frequently asked questions related to the API.</p>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
