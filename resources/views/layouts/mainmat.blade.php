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
    {!! HTML::style('assets/css/main.css') !!}

</head>
<body>
<main>
    <nav>
        <div class="nav-wrapper">
            <a href="javascript:void(0)" class="brand-logo title-menu">
                <img src="{{asset('assets/img/logo_enera_networks.png')}}" alt="Enera"> <span style="font-size: 25px;">Networks</span></a>
            <ul id="nav-mobile" class="right show-on-small">
                <li><a href="javascript:void(0)"><i class="material-icons user">perm_identity</i></a></li>
                {{--<img class="responsive-img" src="{{asset('assets/img/logo_main.png')}}"> para poner la imagen del usuario  --}}
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="dropdown-button" href="javascript:void(0)" data-activates="networks">Nodos
                        <i class="material-icons right mi-1_5">wifi</i></a>
                </li>
                <li><a href="javascript:void(0)"><i class="material-icons mi-1_5">&#xE8B6;</i></a></li>
                <li><a href="javascript:void(0)"><i class="material-icons mi-1_5">&#xE7F4;</i></a></li>
            </ul>
            <i class="material-icons mobil-menu hide-on-large-only">menu</i>
        </div>
    </nav>
    <ul id="networks" class="dropdown-content dropdown-menu up-arrow">
        <li><a href="javascript:void(0)">one</a></li>
        <li><a href="javascript:void(0)">two</a></li>
        <li><a href="javascript:void(0)">three</a></li>
    </ul>

    @yield('content')
</main>
<footer class="page-footer">
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



@yield('scripts')

<script>
    $(document).ready(function () {
        $(".dropdown-button").dropdown();

    });
</script>
</body>
</html>