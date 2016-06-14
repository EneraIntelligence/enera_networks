<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_usuarios.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Usuarios</span><span style="font-weight: 200;" class="right">{{$user}}</span>
</div>

<div class="divider grey darken-1"></div>

<div class="section" style="height: 100px;">


    <!-- gráfica -->
    <div id="user-chart"></div>


</div>

<div class="divider grey darken-1"></div>

<div class="section dash-data" style="font-size: 20px; padding-bottom: 0; margin-bottom: -10px;">

    <div class="row">
        <div class="col s6 right-align">
            <span style="font-weight: 300;">Esta semana:</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-weight: 200;font-size:19px;">150,000
                <span style="font-size:14px;font-weight:300;" class="green-text-light">
                    <i style="vertical-align:bottom;" class="material-icons">arrow_drop_up</i>23%
                </span>
            </span>
        </div>

        <div class="col s6 right-align">
            <span style="font-size:9px; font-weight: 300; vertical-align:top;">{{date('d-M',strtotime( "-7 days" ))}} - {{date('d-M')}}</span>
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
