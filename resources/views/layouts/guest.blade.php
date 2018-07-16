<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta-content')
    <link rel="stylesheet" href="{{ asset('tpl/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/font-awesome/css/font-awesome.min.css') }}"  type="text/css">
    @yield('style')
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    
    <!-- Google Analytics -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-102670771-1', 'auto');
    ga('require', 'ringostat');
    ga('send', 'pageview');

    </script>
    <script type="text/javascript">
        (function (d,s,u,e,p) {
            p=d.getElementsByTagName(s)[0],e=d.createElement(s),e.async=1,e.src=u,p.parentNode.insertBefore(e, p);
        })(document, 'script', 'https://ringostat.com/numbers/v4/fb/fb86ebfcb3a84c77d1f27d9962a87c5ffca56daf.js');
    </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-59X5MTF');</script>
    <!-- End Google Tag Manager -->

    
    
</head>
<body >
     <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter45201291 = new Ya.Metrika({
                        id:45201291,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/45201291" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59X5MTF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    
<header>
    <div class="container">
        <button class="hidden-lg hidden-md hidden-sm" id="mobile-menu"><i class="fa fa-bars"></i></button>
        <ul class="hidden-lg hidden-md hidden-sm" id="mobile-menu-list">
            @include('view.blocks.food-block')
        </ul>
        <a href="{{ route('index') }}" id="logo"><span class="hidden-sm hidden-xs">Быстрая доставка пиццы и суши в Алматы</span></a>
        <div class="visible-xs">
            <div class="phones is-lft">
                @include('view.blocks.phones')
            </div>
        </div>
        <div id="user-icons">
            @if ( isset($_SESSION['cart']) && count($_SESSION['cart'] ) > 0 )
                <a href="{{ route('cart') }}" class="cart-ico"><span class="cart-mini-count">{{ \App\Http\Controllers\View\CartController::getCartGoodCount() }}</span></a>
            @else
                <a href="{{ route('cart') }}" class="cart-ico logged empty"></a>
            @endif
            @if (Auth::guest())
                <a href="#" data-toggle="modal" data-target="#login-modal" id="cabinet"></a>
            @else
                <div class="dropdown">
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-xs" style="font-size: 12px;"><span style="border-bottom: 1px dashed #fff;">Кабинет</span>: {{ Auth::user()->name }}</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        @if (Auth::user()->hasRole('superadmin'))
                            <li><a href="{{ route('home') }}" target="_blank">CMS</a></li>
                        @endif
                        <li><a href="{{ route('orderHistory') }}">История заказов</a></li>
                        <li><a href="{{ route('createdPizza') }}">Созданные пиццы</a></li>
                        <li><a href="{{ route('account') }}">Мои данные</a></li>
                        <li style="border-bottom: none">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

        <div class="header-content is-full hidden-xs">
            <div class="header-info-holder is-lft">
                <nav class="navbar visible-xs pull-left">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            @include('view.blocks.top-menu')
                        </div>
                    </div>
                </nav>

                <div id="nav" class="is-left hidden-xs" style="height: 43px;">
                    @include('view.blocks.top-menu')
                </div>

                <div class="is-full hidden-xs">
                    <div class="phones is-lft">
                        @include('view.blocks.phones')
                    </div>

                    <div class="schedule is-rgt" style="margin-left: 65px;">
                        @include('view.blocks.work-time')
                    </div>
                </div>
            </div>
        </div>

        <div id="socials" class="socials">
            @include('view.blocks.social')
        </div>
    </div>

    <div class="curve-bottom"></div>
</header>
<div id="main-categories" class="is-full">
    <div id="main-categories-bottom"></div>
    <div class="container">
        <div class="row">
            @include('view.blocks.main-menu')
        </div>
    </div>
</div>

@yield('content')

<div id="zone" class="is-full  no-margin-top ">
    <div class="white-curve-top"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h3>Время и зоны доставки</h3>
            </div>

            <div class="col-xs-6">
                <div id="zone-map" class="is-full">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1KZzf7uEvbwEL7tUBuvoLTM-n6efxjbO2" width="100%" height="250"></iframe>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="green-square map-item is-full">
                    <p><strong>Зелёный квадрат</strong> - правило "опаздаем - пицца в подарок" действует только в пределах зелёного квадрата: Аль-Фараби - Розыбакиева - Райымбека - Калдаякова.</p>
                    <div class="green-bullet"></div>
                </div>
                <div class="red-square map-item is-full">
                    <p><strong>Красный квадрат</strong> - доставка пиццы в пределах красного квадрата - бесплатно в течение 1-1,5 часа (точное время Вам сообщит оператор во время составления заказа).</p>
                    <div class="red-bullet"></div>
                    <div class="red-square-bottom"></div>
                </div>
                <div class="faq-link is-full">
                    <a href="{{ route('faq') }}">Частые вопросы</a>
                </div>
            </div>
        </div>
    </div>

    <div class="curve-bottom"></div>
</div>

    @yield('seo-content')

<div id="footer-categories" class="is-full">
    <div class="wood-shadow-holder is-abs">
        <div></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h3>Выберите блюда из нашего меню</h3>
            </div>
            @include('view.blocks.main-menu')
        </div>
    </div>
</div>

<div id="footer-info" class="is-full">
    <div class="gray-curve-top"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="feedback-title is-full">Узнавай про акции первым!</div>
                <form id="subscription">
                    <div class="feedback-input is-full">
                        <input type="email" class="form-control" placeholder="e-mail" required>
                        <p class="help-block"></p>
                    </div>
                    <div class="feedback-button is-full">
                        <button type="submit" class="btn red-button">ПОДПИСАТЬСЯ</button>
                        <img class="hidden" src="{{ asset('tpl/images/loader.gif') }}">
                    </div>
                </form>
            </div>

            @include('view.blocks.footer-menu')

            <div class="col-xs-12 visible-xs footer-socials-mobile">
                <div class="footer-socials-title">мы в социальных сетях:
                    <div class="socials" style="display: inline-block">
                        @include('view.blocks.social')
                    </div>
                </div>
            </div>

            <div id="footer-contacts-info" class="col-sm-4 col-xs-8">
                <div class="phones is-rgt">
                    @include('view.blocks.phones')
                </div>

                <div class="schedule is-full">
                    @include('view.blocks.work-time')
                </div>
            </div>

            <div class="col-xs-12 hidden-xs">
                <div class="footer-socials socials is-rgt">
                    @include('view.blocks.social')
                </div>
                <div class="footer-socials-title is-rgt">мы в социальных сетях:</div>
            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <p class="copyright">&copy; 2017 | Happy Pizza</p>
            </div>
            <div class="col-xs-6">
                
            </div>
        </div>
    </div>
</footer>
@include('view.blocks.cart')

@if (Auth::guest())
    @include('view.blocks.auth-modal')
@endif

<script src="{{ asset('tpl/js/jquery.min.js') }}"></script>
<script src="{{ asset('tpl/js/swiper.min.js') }}"></script>
<script src="{{ asset('tpl/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('tpl/js/maskedinput.js') }}"></script>
<script src="{{ asset('tpl/js/main.js') }}"></script>
@if (Auth::guest()) <script src="{{ asset('tpl/js/user.js') }}"></script> @endif
@yield('script')
<a href="#" class="to-top" id="to-top"></a>
</body>
</html>