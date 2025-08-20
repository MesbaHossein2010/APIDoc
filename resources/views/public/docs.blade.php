@extends('layouts.base')

@section('title', 'مستندات API')

<style>
    .hamburger-btn {
        display: none;
        font-size: 28px;
        background: none;
        border: none;
        cursor: pointer;
        position: fixed;
        top: 15px;
        right: 15px;
        z-index: 1001; /* بالاتر از منو */
        transition: opacity 0.3s ease-in-out; /* انیمیشن مخفی و نمایش */
    }

    .close-btn {
        display: none;
    }

    .docs-layout {
        display: flex;
        flex-direction: row;
        width: 100%;
    }

    .sidebar {
        width: 220px;
        min-width: 220px;
        background: #f7f7f7;
        height: 100vh;
        overflow-y: auto;
    }

    .docs-content {
        flex: 1;
        padding: 24px;
    }

    @media (max-width: 768px) {
        .hamburger-btn {
            display: block;
        }

        .docs-layout {
            display: block;
        }

        .sidebar {
            display: block;
            position: fixed !important;
            top: 0;
            right: 0;
            width: 220px;
            height: 100vh;
            background: #f7f7f7;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: -2px 0 5px rgba(0,0,0,0.3);
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        .docs-layout.show-sidebar .sidebar {
            transform: translateX(0);
        }

        .close-btn {
            display: block;
            position: absolute;
            top: 10px;
            left: 10px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        #search-section,
        #title-section {
            display: none;
        }
    }

    /* انیمیشن نرمی برای مخفی و نمایش همبرگری */
    .hamburger-hidden {
        opacity: 0;
        pointer-events: none;
    }
</style>

@section('content')
    @if(!isset($search))
        @php($search = null)
    @endif
    @if(!isset($sections))
        @php($sections = null)
    @endif

    <!-- دکمه منوی همبرگری -->
    <button class="hamburger-btn" id="hamburger-btn" aria-label="Toggle Menu">☰</button>

    <!-- پس‌زمینه تار در موبایل -->
    <div class="overlay"></div>

    <div class="docs-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <button class="close-btn" aria-label="Close Menu">✕</button>
            <div class="sidebar-header">
                <center><h2 id="title-section">مستندات API</h2></center>
                <form method="post">
                    @csrf
                    <input  id="search-section" style="direction: rtl" name="search" type="text" class="sidebar-search"
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

        <!-- Content -->
        <main class="docs-content">
            <article class="docs-article">
                @foreach($sections as $section)
                    @if(count($section->docs))
                        <div class="section-wrapper">
                            <div class="section-header">
                                <center><h2 class="section-title">{{ $section->title }}</h2></center>
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
            const observerOptions = { root: null, rootMargin: '0px 0px -70% 0px', threshold: 0 };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                                link.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
                            }
                        });
                    }
                });
            }, observerOptions);
            sections.forEach(section => observer.observe(section));

            const hamburgerBtn = document.getElementById('hamburger-btn');
            const docsLayout = document.querySelector('.docs-layout');
            const overlay = document.querySelector('.overlay');
            const closeBtn = document.querySelector('.close-btn');

            function closeSidebar() {
                docsLayout.classList.remove('show-sidebar');
                overlay.classList.remove('show');
                hamburgerBtn.classList.remove('hamburger-hidden'); // نمایش همبرگری با انیمیشن
            }

            hamburgerBtn.addEventListener('click', () => {
                docsLayout.classList.toggle('show-sidebar');
                overlay.classList.toggle('show');
                hamburgerBtn.classList.add('hamburger-hidden'); // مخفی شدن همبرگری با انیمیشن
            });

            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);

            navLinks.forEach(link => {
                link.addEventListener('click', closeSidebar);
            });
        });
    </script>
@endpush
