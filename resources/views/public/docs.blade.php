@extends('layouts.base')

@section('title', 'API Documentation')

@section('content')
    <div class="docs-layout">
        <!-- Slim Sidebar (220px) -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>API Docs</h2>
                <input type="text" class="sidebar-search" placeholder="Search..." aria-label="Search documentation">
            </div>

            <nav class="sidebar-nav">
                <ul class="sidebar-menu">
                    <!-- Expanded Sections -->
                    <li class="sidebar-section">Introduction</li>
                    <li><a href="#overview" class="active">Overview</a></li>
                    <li><a href="#quickstart">Quick Start</a></li>
                    <li><a href="#authentication">Authentication</a></li>
                    <li><a href="#rate-limits">Rate Limits</a></li>

                    <li class="sidebar-section">Core Endpoints</li>
                    <li><a href="#users">Users API</a></li>
                    <li><a href="#products">Products API</a></li>
                    <li><a href="#orders">Orders API</a></li>
                    <li><a href="#inventory">Inventory API</a></li>
                    <li><a href="#payments">Payments API</a></li>

                    <li class="sidebar-section">Advanced Features</li>
                    <li><a href="#webhooks">Webhooks</a></li>
                    <li><a href="#batch">Batch Operations</a></li>
                    <li><a href="#web-sockets">Real-Time (WebSockets)</a></li>
                    <li><a href="#graphql">GraphQL API</a></li>

                    <li class="sidebar-section">Data Handling</li>
                    <li><a href="#pagination">Pagination</a></li>
                    <li><a href="#filtering">Filtering</a></li>
                    <li><a href="#sorting">Sorting</a></li>
                    <li><a href="#search">Search</a></li>
                    <li><a href="#export">Data Export</a></li>

                    <li class="sidebar-section">SDKs & Tools</li>
                    <li><a href="#javascript">JavaScript SDK</a></li>
                    <li><a href="#python">Python SDK</a></li>
                    <li><a href="#php">PHP SDK</a></li>
                    <li><a href="#cli">CLI Tool</a></li>

                    <li class="sidebar-section">Support</li>
                    <li><a href="#errors">Error Codes</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#status">API Status</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Documentation Content (with scroll demo) -->
        <main class="docs-content">
            <article class="docs-article">
                <h1>API Documentation</h1>

                <!-- Overview Section -->
                <section id="overview">
                    <h2>Overview</h2>
                    <p>Our API provides programmatic access to all platform features. This documentation covers:</p>
                    <ul>
                        <li>REST API endpoints</li>
                        <li>Authentication methods</li>
                        <li>Rate limiting policies</li>
                        <li>SDK integrations</li>
                    </ul>
                </section>

                <!-- Quick Start Section -->
                <section id="quickstart">
                    <h2>Quick Start</h2>
                    <p>Make your first API request:</p>
                    <pre><code>curl -X GET https://api.example.com/v1/users \
-H "Authorization: Bearer YOUR_ACCESS_TOKEN"</code></pre>
                </section>

                <!-- Authentication Section -->
                <section id="authentication">
                    <h2>Authentication</h2>
                    <p>All API requests require an OAuth2 bearer token:</p>
                    <pre><code>Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...</code></pre>
                    <p>Obtain tokens via:</p>
                    <ul>
                        <li>OAuth2 flow</li>
                        <li>API key generation</li>
                        <li>Session cookies</li>
                    </ul>
                </section>

                <!-- Users API Section -->
                <section id="users">
                    <h2>Users API</h2>
                    <h3>Get All Users</h3>
                    <pre><code>GET /api/v1/users</code></pre>
                    <h3>Create User</h3>
                    <pre><code>POST /api/v1/users
{
    "name": "John Doe",
    "email": "john@example.com"
}</code></pre>
                </section>

                <!-- More sections to force scrolling -->
                <section id="rate-limits">
                    <h2>Rate Limits</h2>
                    <p>100 requests/minute per IP address.</p>
                </section>

                <section id="products">
                    <h2>Products API</h2>
                    <p>Manage product catalog.</p>
                </section>

                <section id="orders">
                    <h2>Orders API</h2>
                    <p>Process and track orders.</p>
                </section>

                <section id="webhooks">
                    <h2>Webhooks</h2>
                    <p>Configure event notifications.</p>
                </section>

                <section id="pagination">
                    <h2>Pagination</h2>
                    <p>All lists support ?page=2&limit=50.</p>
                </section>

                <section id="errors">
                    <h2>Error Codes</h2>
                    <table>
                        <tr>
                            <td>400</td>
                            <td>Bad Request</td>
                        </tr>
                        <tr>
                            <td>401</td>
                            <td>Unauthorized</td>
                        </tr>
                        <tr>
                            <td>404</td>
                            <td>Not Found</td>
                        </tr>
                    </table>
                </section>
            </article>
        </main>
    </div>
@endsection
