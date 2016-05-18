@extends('layouts.mainmat')

@section('title', 'Nodos')

@section('head_scripts')
    {!! HTML::style('assets/css/nodes.css') !!}
@stop

@section('content')
    <ul class="collapsible  hide-on-med-and-up menu grey darken-3 white-text" data-collapsible="accordion">
        <li>
            <div class="collapsible-header grey darken-3 white-text">
                <div class="row zero">
                    <div class="col s6" style="text-align: center;">
                        <span>Nombre</span>
                    </div>
                    <div class="col s6" style="text-align: right;">
                        <span>Nodos</span>
                    </div>
                </div>
            </div>
        </li>
        @foreach($branches as $branch)
            <li>
                <div class="collapsible-header grey darken-3 white-text">
                    <span class="icon-menu">
                        {{strtoupper(substr($branch->name, 0, 2)) }}
                    </span>
                    <span>
                        {{(strlen($branch->name > 28)) ? $branch->name : substr($branch->name, 0, 28)}}
                    </span>
                    <span class="data-menu" style="padding: 0 10px 0 0;">
                        {{ $branch->campaign_logs()->where('interaction.welcome_loaded','exists',true)->count() }}
                        / {{ count($branch->aps) }}
                    </span>
                </div>
                <div class="collapsible-body">
                   <div class="container">
                       <ul class="list grey darken-3 white-text">
                           <li data-icon="keyboard_arrow_right">Status: {{$branch->status}}</li>
                           <li data-icon="keyboard_arrow_right">Globales: {{($branch->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</li>
                           <li data-icon="keyboard_arrow_right">Aps: {{count($branch->aps)}}</li>
                           <li data-icon="keyboard_arrow_right">Red: {{$branch->network->name}}</li>
                       </ul>
                       <a href="{{route('branches::show', ['id' => $branch->id])}}" class="waves-effect waves-light btn btn-mobil">Ver más detalles</a>
                   </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="hide-on-small-only">
        <div class="row">
            @foreach($branches as $branch)
                <div class="col m4 l3">
                    <div class="card grey darken-3 white-text">
                        <div class="card-content white-text">
                            <div class="card-image">
                                <img src="{{"https://s3-us-west-1.amazonaws.com/enera-publishers/branch_items/". ($branch->portal['image'] )}}"
                                     class="responsive-img" height="258" width="258">
                                <span class="card-title">{{$branch->name}}</span>
                            </div>
                            <ul class="list white-text">
                                <li data-icon="keyboard_arrow_right">Nombre: {{$branch->name}}</li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Status: {{$branch->status}}</li>
                                <hr>
                                <li data-icon="keyboard_arrow_right">Globales: {{($branch->filters['external_ads']) ? 'Activas' : 'Inactivas'}}</li>
                            </ul>
                        </div>
                        <div class="card-action">
                            <a class="blue-text" href="{{route('branches::show', ['id' => $branch->id])}}">Ver más detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
    </script>
@stop

