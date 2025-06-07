@extends('layouts.base')

@section('title', 'مستندات API')

{{--@use(resources\views\helpers\Helper)
@php($helper = new \resources\views\helpers\Helpers())--}}

<style>
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
                <center>
                    <h2>مستندات API</h2>
                </center>
                <form method="post">
                    @csrf
                    <input style="direction: rtl" name="search" type="text" class="sidebar-search"
                           placeholder="جستجو..." aria-label="جستجوی مستندات" value="{{ $search }}">
                    <input type="submit" hidden="">

                    @if($search)
                        <a href="" class="cancel-search-btn">✕ بازگشت به صفحه اصلی</a>
                    @endif
                </form>
            </div>
            <nav class="sidebar-nav" style="overflow: hidden">
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
                            <li>
                                <a href="#{{ $doc->slug }}">{!! str_ireplace($search, "<span style='color: cyan;'>".$search."</span>", e($doc->title)) !!}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>
        </aside>

        <!-- Documentation Content (with scroll demo) -->
        <main class="docs-content">
            <article class="docs-article">
                @foreach($sections as $section)
                    @if(count($section->docs))
                        <div class="section-wrapper">
                            <div class="section-header">
                                <center>
                                    <h2 class="section-title">{{ $section->title }}</h2>
                                </center>

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
