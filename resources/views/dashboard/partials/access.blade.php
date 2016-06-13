<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_conexiones.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Accesos</span><span style="font-weight: 200;" class="right">{{count($access)}}</span>
</div>

<div class="divider grey darken-1"></div>

<div class="row" style="margin-top:10px; margin-bottom: 10px;">

    <div class="col s6 left-align">
        <span style="font-weight: 400;">Esta semana:</span>
        <br>
        <span style="font-size:9px; font-weight: 300; vertical-align:top;">{{date('d-M',strtotime( "-7 days" ))}} - {{date('d-M')}}</span>
        <br>
        <i class="green-text-light material-icons" style="vertical-align:bottom;">arrow_drop_up</i>
        <span style="font-weight: 200;font-size:19px;">10,000</span>
    </div>

    <div class="col s6 left-align left-border">
        <span style="font-weight: 400;">Este mes:</span>
        <br>
        <span style="font-size:9px; font-weight: 300; vertical-align:top;">{{date('d-M', strtotime('first day of this month'))}} - {{date('d-M', strtotime('last day of this month'))}}</span>
        <br>
        <i class="red-text material-icons" style="vertical-align:bottom;">arrow_drop_down</i>
        <span style="font-weight: 200;font-size:19px;">16,000</span>

    </div>
</div>

<div class="divider grey darken-1"></div>

<div class="section dash-data" style="font-size: 20px; padding-bottom: 0; margin-bottom: -10px;">

    <div class="row">
        <div class="col s6 right-align">
            <span style="font-weight: 300;">Recurrentes:</span>
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
