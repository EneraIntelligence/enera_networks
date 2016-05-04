<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    {{--<link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">--}}
    <link rel="icon" type="image/png" href="{!! URL::asset('images/favicon.png') !!}" sizes="32x32">
    <title>Enera Networks - @yield('title')</title>
    @yield('head_scripts')

            <!-- Material - CSS -->
    {!! HTML::style('css/material-extra.css') !!}
    {!! HTML::style('css/materialize.css') !!}

            <!-- App - CSS -->
    {!! HTML::style('assets/css/app.css') !!}

</head>
<body style="opacity: 0; filter: alpha(opacity=0);" class="grey lighten-3">


<head>
    <nav>

        <!-- networks navbar -->
        <div class="nav-wrapper grey darken-3" >

            <!-- platform logo -->
            <a href="javascript:void(0)" onclick="platformMenu.toggle(event)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_networks.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Networks</span>
                <i style="top: 20px; position: absolute; left: 60px;" class="tiny material-icons platform-hide">arrow_drop_down</i>
            </a>


            <!-- desktop menu left-->
            <ul class="left hide-on-med-and-down platform-hide">
                <li>
                    <a class="dropdown-button" href="#!" data-activates="networksDropdown">
                        Red: Red X
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul id="networksDropdown" class="dropdown-content">
                        <li><a href="#!">Red X</a></li>
                        <li><a href="#!">Red Y</a></li>
                        <li><a href="#!">Red Z</a></li>
                    </ul>

                </li>

                <li><a href="badges.html">Nodos</a></li>
                <li><a href="mobile.html">Campañas</a></li>
            </ul>

            <!-- desktop menu right-->
            <ul class="right platform-hide">
                <li class="hide-on-med-and-down"><a href="collapsible.html">Reportes</a></li>
                <li><a href="collapsible.html"><i class="material-icons">perm_identity</i></a></li>
            </ul>



            <!-- mobile menu button -->
            <a href="javascript:void(0)" data-activates="mobile-demo" class="button-collapse platform-hide">
                <i class="material-icons">menu</i>
            </a>

            <!-- mobile side menu -->
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html">Redes</a></li>
                <li><a href="badges.html">Nodos</a></li>
                <li><a href="mobile.html">Campañas</a></li>
                <li><a href="collapsible.html">Reportes</a></li>
            </ul>

        </div>

        <!-- publishers -->
        <div class="nav-wrapper blue" data-url="http://publishers.enera-intelligence.mx">

            <a href="javascript:void(0)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_publishers.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Publishers</span>
            </a>

        </div>

        <!-- admins -->
        <div class="nav-wrapper red" data-url="http://admins.enera-intelligence.mx">

            <a href="javascript:void(0)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_admins.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Admins</span>
            </a>

        </div>

    </nav>

    <ul id="networks" class="dropdown-content dropdown-menu up-arrow">
        <li><a href="javascript:void(0)">one</a></li>
        <li><a href="javascript:void(0)">two</a></li>
        <li><a href="javascript:void(0)">three</a></li>
    </ul>
</head>


<div class="progress page-loader grey lighten-5">
    <div class="indeterminate grey darken-2"></div>
</div>


<main>

    @yield('content')

</main>



<footer class="page-footer grey darken-3">
    <div class="footer-copyright">
        <div class="container">
            @if(!isset($hideTermsFooter) || !$hideTermsFooter)
                <a href="{!! URL::route('terms') !!}" class="grey-text text-lighten-4 left">Términos y
                    condiciones</a>
            @endif
            <span class="grey-text text-lighten-4 right"> © 2016 Copyright Text </span>

        </div>
    </div>
</footer>

<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<!-- Material - JS and GSAP-->
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/materialize.js') !!}
{!! HTML::script('js/greensock/TweenLite.min.js') !!}
{!! HTML::script('js/greensock/plugins/CSSPlugin.min.js') !!}
{!! HTML::script('js/greensock/easing/EasePack.min.js') !!}
{!! HTML::script('js/greensock/utils/Draggable.min.js') !!}

{!! HTML::script('js/platform_menu.js') !!}



@yield('scripts')

<script>
    $(document).ready(function () {

        platformMenu.initialize();

        //materialize elemenst initialization
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown();

        //show page when all ready
        var body = $("body");
        body.css("opacity",1);
        body.css("filter","alpha(opacity=100)");

    });
</script>
</body>
</html>