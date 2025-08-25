@extends('layouts.base')

@section('title', 'مستندات API')

<style>
    .hamburger-btn{display:none;font-size:28px;background:none;border:none;cursor:pointer;position:fixed;top:15px;right:60px;z-index:1001;transition:opacity .3s ease-in-out}.close-btn{display:none}.docs-layout{display:flex;flex-direction:row;width:100%}.sidebar{width:220px;min-width:220px;height:100vh;overflow-y:auto;transition:background .3s,color .3s}.sidebar-header{padding:15px;transition:background .3s,color .3s}.sidebar-header input,.cancel-search-btn{width:100%;padding:6px 8px;margin-top:5px;border-radius:4px;border:1px solid;transition:background .3s,color .3s,border-color .3s}.docs-content{flex:1;padding:24px;transition:background .3s,color .3s}.sidebar-section{cursor:pointer;padding:10px;font-weight:bold;border-bottom:1px solid rgba(0,0,0,.1);transition:background .3s}.sidebar-submenu{max-height:0;overflow:hidden;transition:max-height .3s ease;padding-left:15px}.sidebar-submenu.open{max-height:500px}@media(max-width:768px){.hamburger-btn{display:block}.docs-layout{display:block}.sidebar{display:block;position:fixed!important;top:0;right:0;width:220px;height:100vh;z-index:1000;overflow-y:auto;box-shadow:-2px 0 5px rgba(0,0,0,.3);transform:translateX(100%);transition:transform .3s ease-in-out}.docs-layout.show-sidebar .sidebar{transform:translateX(0)}.close-btn{display:block;position:absolute;top:10px;left:10px;background:none;border:none;font-size:24px;cursor:pointer}#search-section,#title-section{display:none}}body.dark{background:#121212;color:#e0e0e0}body.dark .sidebar{background:#1a1a1a;color:#e0e0e0}body.dark .sidebar-header{background-color:#1a1a1a;color:#e0e0e0}body.dark .sidebar-header h2{color:#fff}body.dark .sidebar-header input,.dark .sidebar-header .cancel-search-btn{background-color:#2a2a2a;color:#e0e0e0;border:1px solid #444}body.dark .sidebar-header input::placeholder{color:#888}body.dark .docs-content{background:#121212;color:#e0e0e0}body.dark h1,body.dark h2,body.dark h3{color:#fff}body.dark a{color:#80deea}body.light{background:#f7f7f8;color:#111}body.light .sidebar{background:#fff;color:#111}body.light .sidebar-header{background-color:#fff;color:#111}body.light .sidebar-header h2{color:#111}body.light .sidebar-header input,.light .sidebar-header .cancel-search-btn{background-color:#f5f5f5;color:#111;border:1px solid #dcdcdc}body.light .sidebar-header input::placeholder{color:#888}body.light .docs-content{background:#f7f7f8;color:#111}body.light h1,body.light h2,body.light h3,body.light p{color:#111}body.light a{color:#0070f3}.toggle-theme-btn{position:fixed;top:15px;right:15px;padding:8px 12px;border:none;border-radius:8px;background:#00bcd4;color:#fff;cursor:pointer;font-weight:bold;z-index:1100;transition:background .3s}.toggle-theme-btn:hover{background:#0097a7}.docs-content pre{background-color:rgba(0,0,0,.05);padding:12px 16px;border-radius:8px;overflow-x:auto;line-height:1.5;font-family:'Fira Code','Courier New',monospace;margin:1em 0;white-space:pre-wrap;word-break:break-word}body.dark .docs-content pre{background-color:#1e1e1e;color:#e0e0e0}body.light .docs-content pre{background-color:#eaeaea;color:#111}.docs-content code{padding:2px 6px;border-radius:4px;font-size:.95em}body.dark .docs-content code{background-color:#2a2a2a;color:#e0e0e0}body.light .docs-content code{background-color:#dcdcdc;color:#111}body.dark .docs-content b,body.dark .docs-content strong,body.dark .docs-content i,body.dark .docs-content em,body.dark .docs-content u,body.dark .docs-content mark{color:inherit}body.light .docs-content b,body.light .docs-content strong{color:#222;font-weight:bolder}body.light .docs-content i,body.light .docs-content em{color:#333;font-style:italic}body.light .docs-content u{color:#222;text-decoration:underline}body.light .docs-content mark{background-color:#ffeb3b;color:#000}/* Scrollbars */body.dark ::-webkit-scrollbar{width:10px;height:10px}body.dark ::-webkit-scrollbar-track{background:#1a1a1a}body.dark ::-webkit-scrollbar-thumb{background:#444;border-radius:6px}body.dark ::-webkit-scrollbar-thumb:hover{background:#555}body.light ::-webkit-scrollbar{width:10px;height:10px}body.light ::-webkit-scrollbar-track{background:#f0f0f0}body.light ::-webkit-scrollbar-thumb{background:#c1c1c1;border-radius:6px}body.light ::-webkit-scrollbar-thumb:hover{background:#a8a8a8}

</style>


@section('content')
    @if(!isset($search))
        @php($search = null)
    @endif
    @if(!isset($sections))
        @php($sections = null)
    @endif

    <button class="hamburger-btn" id="hamburger-btn" aria-label="Toggle Menu">☰</button>
    <button class="toggle-theme-btn" id="toggle-theme">☀️</button>

    <div class="overlay"></div>

    <div class="docs-layout">
        <aside class="sidebar">
            <button class="close-btn" aria-label="Close Menu">✕</button>
            <div class="sidebar-header">
                <center><h2 id="title-section">مستندات API</h2></center>
                <form method="post">
                    @csrf
                    <input id="search-section" style="direction: rtl" name="search" type="text" class="sidebar-search"
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
                            <ul class="sidebar-submenu">
                                @foreach($section->docs as $doc)
                                    <li><a href="#{{ $doc->slug }}">{{ $doc->title }}</a></li>
                                @endforeach
                            </ul>
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
            const observerOptions = {root: null, rootMargin: '0px 0px -70% 0px', threshold: 0};

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                                link.scrollIntoView({behavior: 'smooth', block: 'nearest', inline: 'nearest'});
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
                hamburgerBtn.classList.remove('hamburger-hidden');
            }

            hamburgerBtn.addEventListener('click', () => {
                docsLayout.classList.toggle('show-sidebar');
                overlay.classList.toggle('show');
                hamburgerBtn.classList.add('hamburger-hidden');
            });

            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);
            navLinks.forEach(link => link.addEventListener('click', closeSidebar));

            // Collapsible sidebar sections
            const sidebarSections = document.querySelectorAll('.sidebar-section');
            sidebarSections.forEach(section => {
                section.addEventListener('click', () => {
                    const submenu = section.nextElementSibling;
                    submenu.classList.toggle('open');
                });
            });

            // Theme toggle
            const themeBtn = document.getElementById('toggle-theme');
            const body = document.body;

            function setTheme(theme) {
                body.classList.remove('light', 'dark');
                body.classList.add(theme);
                localStorage.setItem('theme', theme);
                themeBtn.textContent = theme === 'dark' ? '☀️' : '🌙';
            }

            const savedTheme = localStorage.getItem('theme') || 'dark';
            setTheme(savedTheme);

            themeBtn.addEventListener('click', () => {
                const currentTheme = body.classList.contains('dark') ? 'dark' : 'light';
                setTheme(currentTheme === 'dark' ? 'light' : 'dark');
            });
        });
    </script>
@endpush
