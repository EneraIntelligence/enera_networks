<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="{!! URL::asset('images/favicon.png') !!}" sizes="32x32">

    <title>error inesperado</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="{!! URL::asset('bower_components/uikit/css/uikit.almost-flat.min.css') !!}"/>

    <!-- altair admin error page -->
    <link rel="stylesheet" href="{!! URL::asset('assets/css/error_page.min.css') !!}" />
    <style>
        .error_page_header{
            background-color: #424242!important;
        }
    </style>
</head>
<body class="error_page">

<div class="uk-width-1-1">
    <div class="error_page_header">
        <div class="uk-width-8-10 uk-container-center">
            500!
        </div>
    </div>
    <div class="uk-width-1-1 ">
        <div class="uk-width-6-10 uk-container-center" style="float: left">
            <div class="uk-width-8-10 uk-container-center">
                <p class="heading_b">Oops! algo salio mal...</p>
                <p class="uk-text-large">
                    hubo un error. Intenta mas tarde.
                </p>
                <a href="#" onclick="history.go(-1);return false;">regresar a la pagina anterior</a>
            </div>
        </div>
        <div class="uk-width-4-10  md-card-content" style="float: right">
            <img src="{!! URL::asset('images/logo_networks.png') !!}">
        </div>
    </div>
</div>


</body>
</html>