<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    {{--    <title>@yield('title')</title>--}}
    <title>Inicio de sesión - Enera Networks</title>

    <!-- css -->
    {!! HTML::style('css/materialize.css') !!}
    {!! HTML::style('css/material-extra.css') !!}

    {!! HTML::style('css/auth/login.css') !!}

    {{--@yield('head_scripts')--}}
</head>

<body class="blue-grey lighten-5">

{{--@yield('content')--}}

{{--<header>--}}
{{--@yield('header')--}}
{{--</header>--}}

<main class="container login-container">
    <!-- Page Content goes here -->
    {{--@yield('content')--}}

    <div class="card-panel login-card center-align">
        <!-- logo -->
        <img class="responsive-img logo-img" src="{!! asset('images/logo_networks.png') !!}" alt="">

        <div class="divider"></div>

        <div class="container center-align">

            {!! Form::open(['route'=>'auth.login', 'class'=>'login-form']) !!}

            <!-- email -->
            <div class="input-field left-align">
                <i class="material-icons prefix">email</i>
                <input id="email" required type="email" class="validate" name="email" value="{!! Input::old('email') !!}">
                <label for="email" data-error="email incorrecto">Email</label>
            </div>
            <!-- email -->

            <!-- password -->
            <div class="input-field left-align">
                <i class="material-icons prefix">lock_outline</i>
                <input id="login_password" required type="password" class="validate" name="password">
                <label for="login_password" data-error="email incorrecto">Contraseña</label>
            </div>
            <!-- password -->


            <!-- send -->
            <button type="submit" class="waves-effect waves-light btn blue darken-3">
                <i class="material-icons left">vpn_key</i>
                Entrar
            </button>
            <!-- send -->

            <!-- keep session -->
            <p class="center-align">
                <input type="checkbox" id="login_page_stay_signed" name="login_page_stay_signed"/>
                <label for="login_page_stay_signed">Recuérdame</label>
            </p>
            <!-- keep session -->

            <!-- help -->
            <a class="waves-effect waves-blue btn-flat modal-trigger"
               style="margin-top: 20px;"
               href="#help-modal"
            >
                ¿Necesitas ayuda?
            </a>
            <!-- help -->

            {!! Form::close() !!}


        </div>

    </div>

    <!-- Help modal -->
    <div id="help-modal" class="modal modal-fixed-footer">
        <div class="modal-content center-align">
            <h4 class="heading_b uk-text-success">¿No puedes iniciar sesión?</h4>

            <p class="left-align">Aquí está la información para que usted vuelva a su cuenta tan pronto como sea
                posible.</p>

            <p class="left-align">En primer lugar, trate con lo más sencillo: si usted recuerda su contraseña, pero no
                funciona, asegúrese
                de que Bloq Mayús está apagado y que su nombre de usuario está escrito correctamente, y vuelva a
                intentarlo.</p>

            <p style="text-align: justify;">Si la contraseña sigue sin funcionar, es hora de <a href="#restore-modal"
                                                                                                onclick="closeHelpModal()"
                                                                                                class="modal-trigger"
                                                                                                id="password_reset_show">restablecer
                    la
                    contraseña</a>.</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">Cerrar</a>
        </div>
    </div>
    <!-- Help modal -->

    <!-- Restore pass modal -->
    <div id="restore-modal" class="modal modal-fixed-footer">

        {!! Form::open(['route'=>'auth.restore']) !!}

        <div class="modal-content center-align" style="overflow: hidden">

            <div class="container">
                <h5 class="heading_b uk-text-success">Reestablecer contraseña</h5>

                <!-- Restore email -->
                <div class="input-field left-align">
                    <i class="material-icons prefix">email</i>
                    <input id="restore_email" name="reset_password_email" type="email" required class="validate">
                    <label for="restore_email" data-error="email incorrecto">Email</label>
                </div>
                <!-- Restore email -->
            </div>


        </div>

        <div class="modal-footer">
            <a href="#!" type="submit" class="left modal-action modal-close waves-effect waves-blue btn-flat">Cerrar</a>
            <button type="submit" class="right waves-effect waves-blue btn-flat">Enviar</button>
        </div>

        {!! Form::close() !!}

    </div>
    <!-- Restore pass modal -->

</main>

<footer class="page-footer grey darken-4">
    {{--@yield('footer')--}}
    <div class="footer-copyright">
        <div class="container">
            <span class="right">© 2016 Enera</span>
        </div>
    </div>
</footer>

{!! HTML::script(asset('js/jquery.min.js')) !!}
{!! HTML::script( 'js/materialize.js' ) !!}

<script>

    /**
     * MENSAJES!
     */
    @if( Session::has('errors') )
    //hubo un error al verificar el correo
    Materialize.toast('Hubo un error al verificar el correo', 6000, 'red no-word-break');
    @endif

    @if( session('error') )
    //hubo un error user o pass
    Materialize.toast('{!! session('error') !!}', 6000, 'red no-word-break');
    @endif

    @if( session('reset_msg2') )
    //mensaje de envío de correo de cambio de contraseña
    Materialize.toast('{!! session('reset_msg2') !!}', 6000, 'red no-word-break');
    @endif

    @if( session('reset_msg') )
    //mensaje de envío de correo de cambio de contraseña
    Materialize.toast('{!! session('reset_msg') !!}', 6000, 'red no-word-break');
    @endif

    @if(session('data')=='active')
        Materialize.toast('Tu cuenta ha sido activada.', 6000, 'green no-word-break');
    @elseif(session('data')=='invalido')
        Materialize.toast('Código inválido.', 6000, 'red no-word-break');
    @endif

    /**
     * READY!
     */
    $(document).ready(function () {
        // activate modal triggers
        $('.modal-trigger').leanModal();
    });

    function closeHelpModal() {
        $('#help-modal').closeModal();
    }
</script>

{{--@yield('footer_scripts')--}}

</body>
</html>