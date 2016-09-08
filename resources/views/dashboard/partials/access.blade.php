<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_conexiones.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Accesos</span>
    <span style="font-weight: 200;" class="right">
        {{ number_format($summary_access['accumulated'],0,'.',',') }}
    </span>
</div>

<div class="divider grey darken-2"></div>
<div class="section dash-data" style="font-size: 20px; padding-bottom: 0; margin-bottom: -10px;">

    <div class="row">
        <div class="col s6 right-align">
            <span style="font-weight: 300;">Acumulados:</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-weight: 200;font-size:19px;">{{ number_format($summary_access['diff_accumulated'],0,'.',',') }}
                <span style="font-size:14px;font-weight:300;" class="{{$summary_access['access_diff'] > 0 ? 'green-text-light': 'red-text'}}">
                    <i style="vertical-align:bottom;" class="material-icons">{{$summary_access['access_diff'] > 0 ? 'arrow_drop_up': 'arrow_drop_down'}}</i>
                    {{ number_format($summary_access['access_diff'],0,'.',',') }}%
                </span>
            </span>
        </div>

        <div class="col s6 right-align">
            <span style="font-size:9px; font-weight: 300; vertical-align:top;" class="grey-text darken-2">{{date('d-M',strtotime( "-7 days" ))}}
                - {{date('d-M')}}</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-size:9px;font-weight:400; vertical-align:top;" class="green-text-light">
                Frente a los 7 días anteriores
            </span>
        </div>

    </div>

</div>
<div class="divider grey darken-2"></div>

<div class="row" style="margin-top:10px; margin-bottom: 10px;">

    <div class="col s6 left-align">
        <span style="font-weight: 400;">Adquiridos:</span>
        <br>
        <span style="font-size:9px; font-weight: 300; vertical-align:top;" class="grey-text darken-2">{{date('d-M',strtotime( "-8 days" ))}}
            - {{date('d-M',strtotime( "-1 days" ))}}</span>
        <br>
        <i class="green-text-light material-icons" style="vertical-align:top;">add</i>
        <span style="font-weight: 200;font-size:19px;">{{ number_format($summary_access['plus1'],0,'.',',') }}</span>
    </div>

    <div class="col s6 left-align left-border">
        <span style="font-weight: 400;">Este mes:</span>
        <br>
        <span style="font-size:9px; font-weight: 300; vertical-align:top;" class="grey-text darken-2">{{date('d-M', strtotime('first day of this month'))}}
            - {{date('d-M', strtotime('last day of this month'))}}</span>
        <br>
        <span style="font-size:14px;font-weight:300;" class="{{$summary_access['plus2'] > 0 ? 'green-text-light': 'red-text'}}">
                    <i style="vertical-align:bottom;" class="material-icons">{{$summary_access['plus2'] > 0 ? 'arrow_drop_up': 'arrow_drop_down'}}</i>
        {{ number_format($summary_access['plus2'],0,'.',',') }}</span>

    </div>
</div>

<div class="divider grey darken-2"></div>

<div class="blank-space"></div>

<div class="section card-bottom">
    <a style="width:80%; margin-left:10%;"
       class="btn cyan" href="#!">Ver más</a>
</div>
