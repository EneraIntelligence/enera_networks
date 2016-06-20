<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_usuarios.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Usuarios</span><span style="font-weight: 200;" class="right">{{$summary_users['accumulated']}}</span>
</div>

<div class="divider grey darken-1"></div>

<div class="section" style="height: 150px;">

    <div class="num1" style="position: absolute; right: 50%; margin-right: 35px; margin-top:5px;">
        {{$summary_users['male']}}
    </div>

    <div class="num2" style="position: absolute; left: 50%; margin-left: 35px; margin-top:5px;">
        {{$summary_users['female']}}
    </div>

    <div style="width: 64px; margin: 0 auto;">
        <img style="width:30px;" width="30" src="{{asset('images/dashboard/male.png')}}" alt="">
        <img style="width:30px;" width="30" src="{{asset('images/dashboard/female.png')}}" alt="">
    </div>


    <div class="label_1_left" style="position: absolute; left: 15px; margin-top:7px;">
        13-18
    </div>

    <div class="label_1_right" style="position: absolute; right: 15px; margin-top:7px;">
        13-18
    </div>

    <div class="label_2_left" style="position: absolute; left: 15px; margin-top:29px;">
        19-24
    </div>

    <div class="label_2_right" style="position: absolute; right: 15px; margin-top:29px;">
        19-24
    </div>

    <div class="label_3_left" style="position: absolute; left: 15px; margin-top:51px;">
        25-34
    </div>

    <div class="label_3_right" style="position: absolute; right: 15px; margin-top:51px;">
        25-34
    </div>

    <!-- gráfica -->
    <div class="user-chart black-text" style="width: 75%; margin: 0 auto;"></div>


</div>

<div class="divider grey darken-1"></div>

<div class="section dash-data" style="font-size: 20px; padding-bottom: 0; margin-bottom: -10px;">

    <div class="row">
        <div class="col s6 right-align">
            <span style="font-weight: 300;">Esta semana:</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-weight: 200;font-size:19px;">{{$summary_users['tw']}}
                <span style="font-size:14px;font-weight:300;" class="green-text-light">
                    <i style="vertical-align:bottom;" class="material-icons">arrow_drop_up</i>{{$summary_users['diff']}}%
                </span>
            </span>
        </div>

        <div class="col s6 right-align">
            <span style="font-size:9px; font-weight: 300; vertical-align:top;">{{date('d-M',strtotime( "-8 days" ))}} - {{date('d-M',strtotime( "-1 days" ))}}</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-size:9px;font-weight:400; vertical-align:top;" class="green-text-light">
                Frente a los 7 días anteriores
            </span>
        </div>

    </div>

</div>

<div class="divider grey darken-1"></div>

<div class="blank-space"></div>

<div class="section card-bottom">
    <a style="width:80%; margin-left:10%;"
       class="btn cyan" href="#!">Ver más</a>
</div>
