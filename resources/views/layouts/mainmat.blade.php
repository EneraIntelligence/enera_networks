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
<body style="opacity: 0; filter: alpha(opacity=0);">


<head>
    <nav>

        <!-- networks navbar -->
        <div class="nav-wrapper grey darken-3" >

            <a href="javascript:void(0)" onclick="platformMenu.toggle(event)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_networks.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Networks</span>
                <i style="top: 20px; position: absolute; left: 60px;" class="tiny material-icons platform-hide">arrow_drop_down</i>
            </a>

            <div id="nav-mobile" class="right platform-hide">
                <a href="javascript:void(0)"><i class="material-icons user">perm_identity</i></a>
                {{--<img class="responsive-img" src="{{asset('assets/img/logo_main.png')}}"> para poner la imagen del usuario  --}}
            </div>


            <i class="material-icons mobil-menu hide-on-large-only platform-hide">menu</i>

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

<!-- Material - JS -->
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/materialize.js') !!}
{!! HTML::script('js/platform_menu.js') !!}



@yield('scripts')

<script>
    $(document).ready(function () {


        platformMenu.initialize();

        $(".dropdown-button").dropdown();

        $("body").css("opacity",1);
        $("body").css("filter","alpha(opacity=40)");

    });
</script>
</body>
</html>