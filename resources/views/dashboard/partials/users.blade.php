<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_usuarios.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Usuarios</span>
    <span style="font-weight: 200;" class="right">{{ number_format($summary_users['accumulated'],0,'.',',') }}</span>
</div>

<div class="divider grey darken-2"></div>

<div class="section" style="height: 150px;">

    <div class="num1" style="position: absolute; right: 50%; margin-right: 35px; margin-top:5px;">
        {{ number_format($summary_users['male'],0,'.',',') }}
    </div>

    <div class="num2" style="position: absolute; left: 50%; margin-left: 35px; margin-top:5px;">
        {{ number_format($summary_users['female'],0,'.',',') }}
    </div>

    <div style="width: 64px; margin: 0 auto;">
        <img style="width:30px;" width="30" src="{{asset('images/dashboard/male_color.png')}}" alt="">
        <img style="width:30px;" width="30" src="{{asset('images/dashboard/female_color.png')}}" alt="">
    </div>


    <div class="label_1_left" style="position: absolute; left: 15px; margin-top:5px;">
        <span style="font-size: 12px;">
            0-17
        </span>
    </div>

    <div class="label_1_right" style="position: absolute; right: 15px; margin-top:5px;">
        <span style="font-size: 12px;">
            0-17
        </span>
    </div>

    <div class="label_2_left" style="position: absolute; left: 15px; margin-top:23px;">
        <span style="font-size: 12px;">
            18-34
        </span>
    </div>

    <div class="label_2_right" style="position: absolute; right: 15px; margin-top:23px;">
        <span style="font-size: 12px;">
            18-34
        </span>
    </div>

    <div class="label_3_left" style="position: absolute; left: 15px; margin-top:42px;">
        <span style="font-size: 12px;">
            35-45
        </span>
    </div>

    <div class="label_3_right" style="position: absolute; right: 15px; margin-top:42px;">
        <span style="font-size: 12px;">
            35-45
        </span>
    </div>
    <div class="label_3_left" style="position: absolute; left: 15px; margin-top:60px;">
        <span style="font-size: 12px;">
            46-60
        </span>
    </div>

    <div class="label_3_right" style="position: absolute; right: 15px; margin-top:60px;">
        <span style="font-size: 12px;">
            46-60
        </span>
    </div>
    <div class="label_3_left" style="position: absolute; left: 15px; margin-top:79px;">
        <span style="font-size: 12px;">
            60+
        </span>
    </div>

    <div class="label_3_right" style="position: absolute; right: 15px; margin-top:79px;">
        <span style="font-size: 12px;">
            60+
        </span>
    </div>

    <!-- gráfica -->
    <div class="user-chart black-text" style="width: 75%; margin: 0 auto;"></div>


</div>

<div class="divider grey darken-2"></div>

<div class="section dash-data" style="font-size: 20px; padding-bottom: 0; margin-bottom: -10px;">

    <div class="row">
        <div class="col s6 right-align">
            <span style="font-weight: 300;">Esta semana:</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-weight: 200;font-size:19px;">{{$summary_users['tw']}}
                <span style="font-size:14px;font-weight:300;" class="{{$summary_users['diff'] > 0 ? 'green-text-light': 'red-text'}}">
                    <i style="vertical-align:bottom;" class="material-icons">{{$summary_users['diff'] > 0 ? 'arrow_drop_up': 'arrow_drop_down'}}</i>
                    {{ number_format($summary_users['diff'],0,'.',',') }}%
                </span>
            </span>
        </div>

        <div class="col s6 right-align grey-text darken-2">
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
       class="btn cyan" href="{{route('reports::devices')}}">Ver más</a>
</div>
