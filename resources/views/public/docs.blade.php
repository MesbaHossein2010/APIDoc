@extends('layouts.base')

@section('title', 'API Documentation')

@section('content')
    @if(!isset($docs))
        @php($docs = null)
    @endif
    @if(!isset($sections))
        @php($sections = null)
    @endif
    <div class="docs-layout">
        <!-- Slim Sidebar (220px) -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>API Docs</h2>
                <input type="text" class="sidebar-search" placeholder="Search..." aria-label="Search documentation">
            </div>

            <nav class="sidebar-nav">
                <ul class="sidebar-menu">
                    @foreach($sections as $section)
                        <li class="sidebar-section">{{ $section->title }}</li>
                        @foreach($section->docs as $doc)
                            <li><a href="#{{ $doc->slug }}">{{ $doc->title }}</a></li>
                        @endforeach
                    @endforeach
                </ul>
            </nav>
        </aside>

        <!-- Documentation Content (with scroll demo) -->
        <main class="docs-content">
            <article class="docs-article">
                <h1>API Documentation</h1>

                @foreach($docs as $doc)
                    <section id="{{ $doc->slug }}">
                        <h2>{{ $doc->title }}</h2>
                        <p>{!! $doc->content !!}</p>
                    </section>
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

            function activateNavLink() {
                let currentSection = null;

                sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= 80 && rect.bottom > 80) {
                        currentSection = section;
                    }
                });

                if (currentSection) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${currentSection.id}`) {
                            link.classList.add('active');
                        }
                    });
                }
            }

            window.addEventListener('scroll', activateNavLink);
            activateNavLink(); // run on load too
        });
    </script>
@endpush
