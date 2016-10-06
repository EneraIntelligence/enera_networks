<?php


if (!isset($summary_devices['dashboard_report_week_before']))
{
    $summary_devices['dashboard_report_week_before'] = array(
            'devices' => 0,
            'new' => 0,
            'recurrent' => 0
    );
}

if (!isset($summary_devices['dashboard_report']))
{
    $summary_devices['dashboard_report'] = array(
            'devices' => 0,
            'new' => 0,
            'recurrent' => 0
    );
}

$dashReport = $summary_devices['dashboard_report'];
$dashReportWeekBefore = $summary_devices['dashboard_report_week_before'];
?>

<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_dispositivos.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Dispositivos</span>
    <span style="font-weight: 200;" class="right">
        {{ number_format($summary_devices['accumulated'],0,'.',',') }}
    </span>
</div>

<div class="divider grey darken-2"></div>


<div class="section dash-data" style="font-size: 20px; padding-bottom: 0; margin-bottom: -10px;">

    <div class="row">
        <div class="col s6 right-align">
            <span style="font-weight: 300;">Activos:</span>
        </div>

        <div class="col s6 right-align">
            <span style="font-weight: 200;font-size:19px;">
                {{number_format($dashReport['devices'],0,'.',',')}}

                <?php
                $devicesIncrement = \Networks\Libraries\MathHelper::calculateIncrement($dashReport['devices'], $dashReportWeekBefore['devices']);
                $devicesColor = 'red';

                if ($devicesIncrement >= 0)
                    $devicesColor = 'green';
                ?>

                <span style="font-size:14px;font-weight:300;" class="{!! $devicesColor !!}-text-light">
                    <i style="vertical-align:middle;" class="material-icons">arrow_drop_up</i>

                    {{number_format($devicesIncrement,2,'.',',')}}%
                </span>
            </span>
        </div>

        <div class="col s6 right-align">
            <span style="font-size:9px; font-weight: 300; vertical-align:top;" class="grey-text darken-2">{{date('d-M',strtotime( "-8 days" ))}}
                - {{date('d-M',strtotime( "-1 days" ))}}</span>
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
        <span style="font-weight: 400;">Nuevos:</span>
        <br>
        <span style="font-size:9px; font-weight: 300; vertical-align:top;" class="grey-text darken-2">{{date('d-M',strtotime( "-8 days" ))}}
            - {{date('d-M',strtotime( "-1 days" ))}}</span>
        <br>

        <?php
        $devicesColor = 'red';
        $devicesIcon = 'arrow_drop_down';
        $devicesAlign = 'bottom';
        if ($dashReport['new'] >= $dashReportWeekBefore['new'])
        {
            $devicesColor = 'green';
            $devicesIcon = 'add';
            $devicesAlign = 'top';
        }
        ?>

        <i class="{!! $devicesColor !!}-text-light material-icons" style="vertical-align:{!! $devicesAlign !!};">{{$devicesIcon}}</i>
        <span style="font-weight: 200;font-size:19px;">{{ number_format($dashReport['new'],0,'.',',') }}</span>
    </div>

    <div class="col s6 left-align left-border">
        <span style="font-weight: 400;">Recurrentes:</span>
        <br>
        <span style="font-size:9px; font-weight: 300; vertical-align:top;" class="grey-text darken-2">{{date('d-M', strtotime('first day of this month'))}}
            - {{date('d-M', strtotime('last day of this month'))}}</span>
        <br>

        <?php
        $devicesColor = 'red';
        $devicesIcon = 'arrow_drop_down';
        $devicesAlign = 'bottom';
        if ($dashReport['recurrent'] >= $dashReportWeekBefore['recurrent'])
        {
            $devicesColor = 'green';
            $devicesIcon = 'add';
            $devicesAlign = 'top';
        }
        ?>

        <i class="{!! $devicesColor !!}-text material-icons" style="vertical-align:{!! $devicesAlign !!};">{{$devicesIcon}}</i>
        <span style="font-weight: 200;font-size:19px;">{{ number_format($dashReport['recurrent'],0,'.',',') }}</span>

    </div>
</div>

<div class="divider grey darken-2"></div>

<div class="blank-space"></div>

<div class="section card-bottom">
    <a style="width:80%; margin-left:10%;"
       class="btn cyan" href="{{route('reports::devices')}}">Ver más</a>
</div>
