<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img id="logo" width="80px" src="/img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://astroloved.com/">Астропрогнозы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://astroloved.com/">Консультация астролога</a>
                </li>
                {{--<li class="nav-item">
                    <a class="nav-link" href="#">Блог</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Отзывы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Обучение</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>--}}

                @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register.form') }}">Создать учетную запись</a>
                </li>
                @endif

                @if(Auth::check())
                    <li class="nav-item @if(!$agent->isMobile()) last-item @endif dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="far fa-user-circle"></i>&nbsp;{{ Auth::user()->profile->firstname }}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{--<div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                        </div>
                    </li>
                    {{--<li class="nav-item last-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>&nbsp;Выйти</a>
                    </li>--}}
                @endif
            </ul>
        </div>
    </nav>
</header>
