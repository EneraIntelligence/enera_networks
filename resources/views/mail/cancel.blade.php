<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enera Intelligence</title>
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: "Roboto", serif, sans-serif;
            color: #000000;
        }
    </style>
</head>
<body style="background-color: rgba(201, 201, 201, 0.26); margin: 0;">
<div style="width: 70%; margin: 0 auto ; min-width: 480px; background-color: #ffffff;">
    <div style="-webkit-box-shadow: 0 4px 10px 0 rgba(176,170,176,1); -moz-box-shadow: 0 4px 10px 0 rgba(176,170,176,1);
    box-shadow: 0 4px 10px 0 rgba(176,170,176,1); ">
        <div style="display: inline-block; padding: 10px; margin: 10px 0; width: 35%; text-align: center; height: 70px; border-right: solid 1px black;">
            <img src="http://enera.mx/images/logo-dark.png" alt="" style="min-height: 70px;  ">
        </div>
        <div style="display: inline-block; padding: 10px; height: 70px; vertical-align: top; margin: 10px 0; width: 55%; text-align: center;">
            <h1 style="color: darkgray;">Cancelacion de campaña</h1>
        </div>
    </div>
</div>
<div style="width: 70%; margin: 0 auto ;min-width: 300px; background-color: #ffffff; position: relative; z-index: -1;">
    <div style="padding: 65px; color: gray">
        <p>Estimado {{$user->name['first'] . ' '. $user->name['last']}}: <br>
            Por el presente le informamos que la campaña "{{$cam->name}}" ha sido cancelda con éxito, por el motivo de "{{$razon}}". Sí usted no ha
            no solicitado esta acción mandar un correo a la dirección "soporte@enera.mx"</p>
        <p>Atte. <br>
        Enera Intelligence</p>
        <p>Este mensaje se genero de forma automatica, si tiene alguna duda o segerencia madar un correo a "soporte@enera.com"</p>
    </div>

</div>

</body>
</html>