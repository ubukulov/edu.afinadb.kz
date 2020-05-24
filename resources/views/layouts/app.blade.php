<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Обучающий портал</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/carousel/">
    <link rel="stylesheet" href="/css/my.css">
    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    @include('pattern.header')

    <main role="main">
        @if(isset($slider) && $slider)
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/dzhoitish.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Каждый день получайте свой личный астрологический прогноз от профессионального ведического астролога!</h1>
                            <p>Знайте свой день силы! Действуйте эффективно! Постройте успешную судьбу!</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/cover_2.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption  text-left">
                            <h1>Получите личную консультацию астролога, узнайте свой психотип!</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/626301_astrology-wallpaper.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Проходите курсы из серии "Сам себе астролог!"</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @endif

        <div class="album py-5 bg-light">
            <div class="container">
                @yield('content')
            </div>
        </div>

        @include('pattern.footer')
    </main>
    @if(!$agent->isMobile())
        <style>
            .fixed-top {
                justify-content: center !important;
            }
        </style>
    @endif
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{--    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>--}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
