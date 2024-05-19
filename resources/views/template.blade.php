<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="/rss.xml">
    <link rel="manifest" href="/manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link href="/css/templatemo-pod-talk.css" rel="stylesheet">
    @hasSection('style')
        <link rel="stylesheet" href="/css/@yield('style').css">
    @endif
    @hasSection('video_style')
        <link rel="stylesheet" href="/css/@yield('video_style').css">
    @endif
    @hasSection('header_script')
        <script src="/js/@yield('header_script').js"></script>
    @endif
</head>
<body>
<main>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand me-lg-5 me-0" href="/">TrueAnime</a>
            <form action="/search" method="post" class="custom-form search-form flex-fill me-3" role="search">
                @csrf
                <div class="input-group input-group-lg">
                    <input name="search" type="search" class="form-control" id="search" placeholder="Поиск" aria-label="Поиск">
                    <button type="submit" class="form-control" id="submit">
                        <i class="bi-search"></i>
                    </button>
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/random">Случайное аниме</a>
                    </li>
                @auth
                    <div class="ms-4">
                        <a href="/profile" class="btn custom-btn custom-border-btn smoothscroll">Профиль</a>
                    </div>
                    <div class="ms-4">
                        <a href="/logout" class="btn custom-btn custom-border-btn smoothscroll">Выйти</a>
                    </div>
                @else
                    <div class="ms-4">
                        <a href="/login" class="btn custom-btn custom-border-btn smoothscroll">Вход</a>
                    </div>
                    <div class="ms-4">
                        <a href="/register" class="btn custom-btn custom-border-btn smoothscroll">Регистрация</a>
                    </div>
                @endauth
                </ul>
            </div>
        </div>
    </nav>
    <section class="hero-section">
        <div class="container">
            @yield('content')
        </div>
    </section>
</main>
<footer class="site-footer">

    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3 col-12">
                <a class="navbar-brand" href="index.html">TrueAnime</a>
            </div>
            <div class="col-lg-7 col-md-9 col-12">
                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" onclick="addFavorite(this); return false;" class="social-icon-link bi-star" title="Добавить в избранное"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="/rss.xml" class="social-icon-link bi-rss-fill" title="RSS"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-whatsapp" title="Whatsapp"></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-12">
                <p class="copyright-text mb-0">Copyright © 2024 TrueAnime Designed by Truskov</p>
            </div>
        </div>
    </div>
</footer>
<script src="/js/jquery.min.js"></script>
@hasSection('footer_script')
    <script src="/js/@yield('footer_script').js"></script>
@endif
@hasSection('video_script')
    <script src="/js/@yield('video_script').js"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>
