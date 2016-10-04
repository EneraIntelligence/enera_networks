@extends('layouts.mainmat')

@section('title', 'Reportes')


@section('head_scripts')
    {!! HTML::style('assets/css/report.css') !!}

@stop


@section('content')

    <div class="container">
        <div class="row report">
            <div class="col s12 m6 l4">
                <div class="card ">
                    <div class="card-content black-text">
                        <span class="card-title"><a class="mdi mdi-cellphone mdi-48px black-text" href="/"></a>Dipositivos</span>
                        <p>Revisa los reportes del tráfico de dispositivos. Con estos reportes podrás identificar
                            cuantos dispositivos transitan por tu establecimiento, su recurrencia y tiempo de
                            permanencia.</p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn blue" href="{{route('reports::devices')}}">Ir a
                            reporte</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card ">
                    <div class="card-content black-text">
                        <span class="card-title"><a class="mdi mdi-face-profile mdi-48px black-text" href="/"></a>Usuarios</span>
                        <p>
                            Conoce a tus visitantes. Con estos reportes podrás identificar a las personas que ya se
                            conectaron a tu red y conocer sus datos demográficos y preferencias por genero o edad.</p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn blue" href="{{route('reports::users')}}">Ir a reporte</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content black-text">
                        <span class="card-title"><a class="mdi mdi-access-point-network mdi-48px black-text"
                                                    href="/"></a>Accesso</span>
                        <p>Conoce cuantos accesos de Internet esta dando. Con este reporte podrás saber cuantas
                            conexiones a internet estas generando en tu red.</p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn blue" href="{{'reports::access'}}">Ir a reporte</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card ">
                    <div class="card-content black-text">
                        <span class="card-title"><a class="mdi mdi-router-wireless mdi-48px black-text" href="/"></a>Redes</span>
                        <p>Revisa como funcionan tus redes. Con este reporte podrás monitorear el funcionamiento de tu
                            red y cada uno de sus nodos. </p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn blue" href="{{route('reports::branches')}}">Ir a
                            reporte</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card ">
                    <div class="card-content black-text">
                        <span class="card-title"><a class="mdi mdi-camera-front-variant mdi-48px black-text"
                                                    href="/"></a>Campañas</span>
                        <p>Analiza tus campañas. Con este reporte podrás revizar el la efectivdad de tus campañas para
                            optimizarlas facilmente y en tiempo real.</p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn blue" href="{{route('reports::campaigns')}}">Ir a
                            reporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
@stop

