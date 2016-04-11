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
            Se ha cambiado su contraseña. Si cree que ha sido un error por favor comuniquese soporte&#64;enera.mx <br>

            <a href="http://networks.enera-intelligence.mx/restore/password//{{$data['id_usuario'].'/'. $data['confirmation_code']}} ">
                recuperar contraseña</a>
            <br>o copia y pega la siguiente url en tu navegador:
            http://admins.enera-intelligence.mx/restore/password/{{$data['id_usuario'].'/'.$data['confirmation_code']}}<br>
            Este enlace expirará después de 24 horas.
        </p>

        <p>Si no has sido tu quien solicito el cambio de contraseña haz clic en este enlace para cancelar el proceso:
            http://admins.enera-intelligence.mx/remove?id={{$data['id_usuario']}}<br>
        </p>
        <p>Enera Intelligence</p>

        <p>Este correo se genero de forma automatica, no contestar. Si usted tiene alguna duda envie un correo a la
            siguente dirección: soporte&#64;enera.mx </p>
    </div>
</div>
<div style="text-align: center;">
    <img src="http://enera.mx/images/logo-dark.png" alt="">
</div>
</body>
</html>
