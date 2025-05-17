@extends('layouts.base')

@section('title', 'API Documentation')

<style>
    /* Inline code inside docs content */
    .docs-content code {
        font-family: 'Courier New', monospace;
        font-size: 0.9rem;
        color: #80bfff; /* soft blue for inline code */
        background-color: #252525; /* dark background matching sidebar-search */
        padding: 0.15em 0.3em;
        border-radius: 4px;
        white-space: nowrap;
        user-select: text;
        transition: background-color 0.2s ease;
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }

    .docs-content code:hover {
        background-color: #333; /* slightly lighter on hover */
    }

    /* Preformatted code blocks */
    .docs-content pre {
        background: #1e1e1e; /* same as your pre background */
        padding: 1rem;
        border-radius: 6px;
        overflow-x: auto;
        border: 1px solid #2d2d2d;
        margin-bottom: 2.5rem;
        font-family: 'Courier New', monospace;
        font-size: 0.9rem;
        color: #80bfff; /* soft blue consistent with inline code */
        line-height: 1.4;
        outline: none !important;
        box-shadow: none !important;
    }

    /* Remove outline and shadow for code inside pre, including focus */
    pre code {
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }

    pre code:focus,
    pre:focus,
    pre code:focus-visible,
    pre:focus-visible {
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }
</style>

@section('content')
    @if(!isset($search))
        @php($search = null)
    @endif
    @if(!isset($sections))
        @php($sections = null)
    @endif
    <div class="docs-layout">
        <!-- Slim Sidebar (220px) -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>API Docs</h2>
                <form method="post">
                    @csrf
                    <input name="search" type="text" class="sidebar-search" placeholder="Search..." aria-label="Search documentation" value="{{ $search }}">
                    <input type="submit" hidden="">

                    @if($search)
                        <a href="" class="cancel-search-btn">✕ Cancel</a>
                    @endif
                </form>
            </div>
            <nav class="sidebar-nav">
                <ul class="sidebar-menu">
                    @if($search == null)
                        @foreach($sections as $section)
                            <li class="sidebar-section">{{ $section->title }}</li>
                            @foreach($section->docs as $doc)
                                <li><a href="#{{ $doc->slug }}">{{ $doc->title }}</a></li>
                            @endforeach
                        @endforeach
                    @else
                        @foreach($docs as $doc)
                            <li><a href="#{{ $doc->slug }}">{!! str_ireplace($search, "<span style='color: cyan;'>".$search."</span>", e($doc->title)) !!}</a></li>
                        @endforeach
                    @endif
                </ul>
            </nav>
        </aside>

        <!-- Documentation Content (with scroll demo) -->
        <main class="docs-content">
            <article class="docs-article">
                <h1>API Documentation</h1>

                @foreach($sections as $section)
                    @if(count($section->docs))
                        <div class="section-wrapper">
                            <div class="section-header">
                                <h2 class="section-title">{{ $section->title }}</h2>
                            </div>

                            @foreach($section->docs as $doc)
                                <section id="{{ $doc->slug }}">
                                    <h3>{{ $doc->title }}</h3>
                                    <p>{!! $doc->content !!}</p>
                                </section>
                            @endforeach
                        </div>
                    @endif
                @endforeach

            </article>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.docs-article section');
            const navLinks = document.querySelectorAll('.sidebar-menu a');

            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -70% 0px',
                threshold: 0
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');

                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');

                                // Scroll the link into view if it's out of view
                                link.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'nearest',
                                    inline: 'nearest'
                                });
                            }
                        });
                    }
                });
            }, observerOptions);

            sections.forEach(section => observer.observe(section));
        });
    </script>
@endpush
