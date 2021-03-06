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
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css">
    <title>Enera Networks - @yield('title')</title>


    <!-- Material - CSS -->
    {!! HTML::style('css/material-extra.css') !!}
    {!! HTML::style('css/materialize.css') !!}

<!-- App - CSS -->
    {!! HTML::style('assets/css/app.css') !!}
    <script type="text/javascript">
        window.smartlook||(function(d) {
            var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
            var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
            c.charset='utf-8';c.src='//rec.smartlook.com/recorder.js';h.appendChild(c);
        })(document);
        smartlook('init', 'ab997449c1233defbf315e0e0123d0e5a5fce206');
    </script>
    <style>
        .zero a {
            font-size: 15px;
            color: #0091ea;
        }

        .breadcrumb:before {
            font-size: 15px;
            cursor: default;
            color: #0091ea !important;
        }
    </style>
    @yield('head_scripts')

</head>

<body style="opacity: 0; filter: alpha(opacity=0);" class="grey lighten-3">


<header class="height-menu">
    <nav>


        <!-- networks navbar -->
        <div class="nav-wrapper grey darken-3">

            <!-- platform logo -->
            <a href="javascript:void(0)" onclick="platformMenu.toggle(event)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_networks.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Network</span>
                {{--<i style="top: 20px; position: absolute; left: 60px;" class="tiny material-icons platform-hide">arrow_drop_down</i>--}}
                <i style="top: 20px; position: absolute; left: 60px;"
                   class="tiny material-icons platform-hide grey-text">keyboard_arrow_down</i>
            </a>


            <!-- desktop menu left-->
            <ul class="left hide-on-med-and-down platform-hide">

                <li style="/*padding:0 10px 0 0;*/ max-height:60px;"
                    class="hide-on-med-and-down {{ isset($navData["home"])?$navData["home"]:""  }} "><a
                            href="{{ route("home") }}">
                        <i class="material-icons">home</i>
                    </a>
                </li>

                <li>

                    <?php
                    $networkCount = auth()->user()->role->name == 'Enera Admin' ?
                            \Networks\Network::where('status', 'active')->count() :
                            auth()->user()->client->networks()->where('status', 'active')->count();

                    $currentNetworkName = \Networks\Network::find(session('network_id'))->name;
                    ?>

                    @if($networkCount>0)
                        <a class="dropdown-button" href="#!" data-activates="networksDropdown" data-beloworigin="true">
                            {{ $currentNetworkName }}
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    @else
                        <a class="dropdown-button" href="#!">
                            {{ $currentNetworkName }}
                        </a>
                @endif

                <!-- Dropdown Structure -->
                    <ul id="networksDropdown" class="dropdown-content">

                        <li>
                            <a href="#!"
                               class="black-text text-darken-1">
                                {{ $currentNetworkName }}
                            </a>
                        </li>

                        @if(auth()->user()->role->name == 'Enera Admin')
                            @foreach(\Networks\Network::where('status','active')->get() as $network)
                                @if($network->name!=$currentNetworkName)
                                    <li>
                                        <a href="{!! Request::url().'?network_id='.$network->_id !!}"
                                           class="grey-text text-darken-1">
                                            {{ $network->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            @foreach(auth()->user()->client->networks()->where('status','active')->get() as $network)
                                @if($network->name!=$currentNetworkName)
                                    <li>
                                        <a href="{!! Request::url().'?network_id='.$network->_id !!}"
                                           class="grey-text text-darken-1">
                                            {{ $network->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif

                    </ul>

                </li>

                <li class="{{ isset($navData["branches"])?$navData["branches"]:""  }}"><a
                            href="{{ route("branches::index") }}">Nodos</a></li>
                <li class="{{ isset($navData["campaigns"])?$navData["campaigns"]:""  }}"><a
                            href="{{ route("campaigns::index") }}">Campañas</a></li>
            </ul>

            <!-- desktop menu right-->
            <ul class="right platform-hide">
                <li class="hide-on-med-and-down {{ isset($navData["reports"])?$navData["reports"]:""  }}"><a
                            href="{{ route("reports::index") }}">Reportes</a></li>

                <li class="hide-on-med-and-down">
                    {{--<a href="{{ route("profile::settings") }}"><i class="material-icons">settings</i></a>--}}
                    <a class='dropdown-button' href="#!" data-activates='settingsMenu' data-beloworigin="true"><i
                                class="material-icons">settings</i></a>

                    <!-- Dropdown settings Structure -->
                    <ul id='settingsMenu' class='dropdown-content'>
                        <!-- TODO llenar con mas opciones como ajustes de red, etc -->
                        {{--<li><a href="#!">one</a></li>--}}
                        {{--<li><a href="#!">two</a></li>--}}
                        <li class="divider"></li>
                        <li><a href="{!! URL::route('auth.logout') !!}">Salir</a></li>
                    </ul>

                </li>

                <li class="{{ isset($navData["profileState"]) ?$navData["profileState"]:""  }}">
                {{--<a href="{{ route("profile::index") }}"><i class="material-icons">perm_identity</i></a>--}}

                <!-- avatar -->

                    {{--                    <a class="valign-wrapper profile-link" href="{{ route("profile::index") }}" style="padding: 7px 5px 0 0;">--}}
                    <a class="valign-wrapper profile-link" href="#!" style="padding: 7px 5px 0 0;">

                        <div style="width: 50px; overflow: hidden; height: 50px;
                                background-image: url('https://s3-us-west-1.amazonaws.com/enera-publishers/avatars/{!! isset($user->image) ? $user->image : 'usern.png'!!}');
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: 50% 50%;
                                ">
                        </div>

                    </a>


                </li>

            </ul>


            <!-- mobile menu button -->
            <ul class="left platform-hide">
                <li>
                    <a href="javascript:void(0)" data-activates="mobile-demo" class="button-collapse ">
                        <i class="material-icons">menu</i>
                    </a>
                </li>
            </ul>


            <!-- mobile side menu -->
            <ul class="side-nav" id="mobile-demo">
                <li class="{{ isset($navData["home"])?$navData["home"]:""  }}">
                    <a href="{{ route("home") }}">Inicio</a>
                </li>

                <li class="{{ isset($navData["branches"])?$navData["branches"]:""  }}">
                    <a href="{{ route("branches::index") }}">Nodos</a>
                </li>

                <li class="{{ isset($navData["campaigns"])?$navData["campaigns"]:""  }}">
                    <a href="{{ route("campaigns::index") }}">Campañas</a>
                </li>

                <li class="{{ isset($navData["reports"])?$navData["reports"]:""  }}">
                    <a href="{{ route("reports::index") }}">Reportes</a>
                </li>

                <li class="divider"></li>
                {{--<li><a href="{{ route("profile::settings") }}">Ajustes de red</a></li>--}}
                <li>
                    <a href="{{ URL::route('auth.logout') }}">Salir</a>
                </li>
            </ul>

        </div>

        <!-- publishers -->
        <div class="nav-wrapper blue" data-url="http://publishers.enera-intelligence.mx">

            <a href="javascript:void(0)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_publishers.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Publisher</span>
            </a>

        </div>

        <!-- admins -->
        <div class="nav-wrapper red" data-url="http://admins.enera-intelligence.mx">

            <a href="javascript:void(0)" class="brand-logo center title-menu">
                <img class="menu-logo" src="{{asset('assets/img/logo_enera_admins.png')}}" alt="Enera">
                <span class="menu-text" style="font-size: 25px;">Admin</span>
            </a>

        </div>

    </nav>


</header>

<!-- platform change loader -->
<div class="progress page-loader grey lighten-5">
    <div class="indeterminate grey darken-2"></div>
</div>

<!-- network selector should be hidden? -->
@if( !isset($navData['hideNetworkSelector']) || $navData['hideNetworkSelector']==false )


    <div class="current-network hide-on-large-only">
        <a class="dropdown-button btn z-depth-2 grey darken-2" href="#!" data-activates="networksDropdownMobile"
           data-beloworigin="true">
            <i class="material-icons left">wifi</i>
            {{ \Networks\Network::find(session('network_id'))->name }}
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </div>

    <!-- Dropdown Structure -->
    <ul id="networksDropdownMobile" class="dropdown-content">

        <li>
            <a href="#!"
               class="black-text text-darken-1">
                {{ $currentNetworkName }}
            </a>
        </li>

        @if(auth()->user()->role->name == 'Enera Admin')
            @foreach(\Networks\Network::where('status','active')->get() as $network)
                @if($network->name!=$currentNetworkName)
                    <li>
                        <a href="{!! Request::url().'?network_id='.$network->_id !!}"
                           class="grey-text text-darken-1">
                            {{ $network->name }}
                        </a>
                    </li>
                @endif
            @endforeach
        @else
            @foreach(auth()->user()->client->networks as $network)
                @if($network->name!=$currentNetworkName)
                    <li>
                        <a href="{!! Request::url().'?network_id='.$network->_id !!}"
                           class="grey-text text-darken-1">
                            {{ $network->name }}
                        </a>
                    </li>
                @endif
            @endforeach
        @endif

    </ul>

@endif <!-- end network selector -->

@if(isset($navData['breadcrumbs']))
    <div class="col s12 l12 head-info black-text">
        <div class="zero">
            <div class="black-text">

                <a href="{{route('home')}}" class="breadcrumb ">Inicio</a>
                @for($i=0; $i< count($navData['breadcrumbs'])-1 ; $i++)
                    <a href="{{route($navData['breadcrumbs'][$i].'::index')}}" class="breadcrumb">
                        {{  trans( "navigation.".$navData['breadcrumbs'][$i] ) }}
                    </a>
                @endfor
                <a class="breadcrumb" style="color: #424242 !important">
                    <b>
                        {{--                            {{  trans( "navigation.".$navData['breadcrumbs'][$i] ) }}--}}
                        {{  $navData['breadcrumbs'][$i]   }}
                    </b>
                </a>
            </div>
        </div>
    </div>
@endif

<main>

    @yield('content')

</main>


<footer class="page-footer grey darken-3">

    <div class="footer-copyright">
        <div class="container">

            <a class="left grey-text text-lighten-2" href="{!! URL::route('terms') !!}"
               class="grey-text text-lighten-4 left">Términos y
                condiciones</a>

        <!--
            @if(!isset($hideTermsFooter) || !$hideTermsFooter)
            <a href="{!! URL::route('terms') !!}" class="grey-text text-lighten-4 left">Términos y
                    condiciones</a>
            @endif
                -->
            <span class="grey-text text-lighten-4 right" style="color: #9e9e9e!important; font-size: 12px;"> © 2016 Enera Intelligence</span>

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
        $(".dropdown-button").dropdown({
            constrain_width: false
        });

        //show page when all ready
        var body = $("body");
        body.css("opacity", 1);
        body.css("filter", "alpha(opacity=100)");

    });
</script>
</body>
</html>