<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: "Roboto", serif, sans-serif;
            color: #000000;
        }
    </style>
</head>
<body>
<div style="text-align: center;">
    <img src="http://networks.enera-intelligence.mx/images/logo_networks.png" alt="">
</div>
<div style="width: 75%; margin: auto;">
    <h2>Recuperación de contraseña </h2>
    <div>
        <p>Estimado/a: {{$data['nombre'] . ' ' . $data['apellido']}}
            Si recibiste este correo electrónico es porque has solicitado restablecer tu contraseña.
            Para continuar el proceso haz clic en el siguiente enlace:<br>
            <a href="http://networks.enera-intelligence.mx/restore/password//{{$data['id_usuario'].'/'. $data['confirmation_code']}} ">
                recuperar contraseña</a>
            <br>o copia y pega la siguiente direcion url en tu navegador:
            http://networks.enera-intelligence.mx/restore/password/{{$data['id_usuario'].'/'.$data['confirmation_code']}}<br>
            Este enlace tiene un tiempo de valides de 24 horas.
            <br><br>
            Si no has solicitado este procedimiento, haz click en el siguiente enlace: <a href="http://networks.enera-intelligence.mx/cancel//{{$data['id_usuario'].'/'. $data['confirmation_code']}} "> Cancelar solicitud </a>
        </p>
        <p>Enera Intelligence</p>

        <p>Este correo fue generado automaticamente, no es necesario contestar. Si usted tiene alguna duda envie un correo a la
            siguente dirección: soporte&#64;enera.mx </p>
    </div>
</div>
<div style="text-align: center;">
    <img src="http://enera.mx/images/logo-dark.png" alt="">
</div>
</body>
</html>
