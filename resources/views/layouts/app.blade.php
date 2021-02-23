<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'Anıl Şenocak - Laravel/Livewire')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <livewire:styles />
        <livewire:scripts />
        {!! Html::style('css/prism.css') !!}
        {!! Html::style('css/app.css') !!}
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css') !!}
        {!! Html::script('js/app.js') !!}
        {!! Html::script('https://code.jquery.com/jquery-3.4.1.min.js') !!}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @auth
            {!! Html::style('css/admin.css') !!}
            {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') !!}
            {!! Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') !!}
        @endauth
    </head>
    <body class="home-template">
        <div class="site-wrapper">
            <header class="site-home-header">
                <div class="outer site-header-background responsive-header-img">
                    <div class="inner">
                        <nav class="site-nav">
                            <div class="site-nav-left-wrapper">
                                <div class="site-nav-left">
                                    <div class="site-nav-content">
                                        <ul class="nav">
                                            <li class="nav-home nav-current">
                                                <a href="{{route("anasayfa")}}" style="color:white;">
                                                    <div class="logo">
                                                        <span class="logo_mark">&gt;</span>
                                                        <span class="logo_text">$ cd /home/</span>
                                                        <span class="logo_cursor"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-about">
                                                <a href="/about" style="color:white;">
                                                    <div class="logo">
                                                        <span class="logo_mark">&gt;</span>
                                                        <span class="logo_text">$ cd /about/</span>
                                                        <span class="logo_cursor"></span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="site-nav-right">
                                @livewire('kategoriler')
                                @auth
                                    <div class="template-corner template-top template-right">
                                        <a href="/admin" style="color:white; text-decoration: none;">
                                            <div class="template-title">
                                                {{Auth::user()->name}} <i class="template-icon fa fa-user"></i>
                                            </div>
                                        </a>
                                        <div class="template-links">
                                            <a class="template-link" href="/admin/yazilar"><span>Yazılar <i class="fas fa-sticky-note"></i></span></a>
                                            <a class="template-link" href="/admin/kategoriler"><span>Kategoriler <i class="fas fa-file-word"></i></span></a>
                                            <a class="template-link" href="/admin/yorumlar"><span>Yorumlar <i class="fas fa-comments"></i></span></a>
                                            <a class="template-link" href="{ { Auth::logout() }}"><span><small>Çıkış Yap<i class="fa fa-heart"></i></small></span></a>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </nav>
                        <div class="site-header-content">
                            <h1 class="Flintstone glitch" data-text="Anıl Şenocak">Anıl Şenocak</h1>
                            <h2 class="Flintstone site-description">Software Engineer</h2>
                        </div>
                    </div>
                </div>
            </header>
            @yield('content')
            <div class="outer site-nav-main">
                <div class="inner">
                    <nav class="site-nav">
                        <div class="site-nav-left-wrapper">
                            <div class="site-nav-left">
                                <a href="{{route("anasayfa")}}">
                                    <h1 class="site-nav-logo Flintstone glitch" data-text="Anıl Şenocak">Anıl Şenocak</h1>
                                </a>

                                <div class="site-nav-content">
                                    <ul class="nav">
                                        <li class="nav-about">
                                            <a href="/about" style="color:white;">
                                                <div class="logo">
                                                    <span class="logo_mark">&gt;</span>
                                                    <span class="logo_text">$ cd /about/</span>
                                                    <span class="logo_cursor"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="site-nav-right">
                            <ul class="nav">
                                @livewire('kategoriler')
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <footer class="site-footer outer">
                <div class="site-footer-content inner">
                    <section class="copyright">Anıl Şenocak &copy; {{date("Y")}}</section>
                    <nav class="site-footer-nav">
                        <a href="https://github.com/senocak" target="_blank" rel="noopener"><i class="fab fa-github"></i></a>
                    </nav>
                </div>
            </footer>
        </div>
        <script>
            $(document).ready(function () {
                var nav = document.querySelector('.site-nav-main .site-nav');

                var lastScrollY = window.scrollY;
                var lastWindowHeight = window.innerHeight;
                var lastDocumentHeight = $(document).height();
                var ticking = false;

                function onScroll() {
                    lastScrollY = window.scrollY;
                    requestTick();
                }

                function onResize() {
                    lastWindowHeight = window.innerHeight;
                    lastDocumentHeight = $(document).height();
                    requestTick();
                }

                function requestTick() {
                    if (!ticking) {
                        requestAnimationFrame(update);
                    }
                    ticking = true;
                }

                function update() {
                    if (lastScrollY >= 20) {
                        nav.classList.add('fixed-nav-active');
                    } else {
                        nav.classList.remove('fixed-nav-active');
                    }

                    ticking = false;
                }

                window.addEventListener('scroll', onScroll, { passive: true });
                window.addEventListener('resize', onResize, false);
                update();
            });
        </script>
        {!! Html::script('js/prism.js') !!}
    </body>
</html>
