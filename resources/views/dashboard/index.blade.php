@extends('layouts.mainmat')

@section('title', 'Campañas')


@section('head_scripts')

@stop


@section('content')

    <div class="carousel">
        <div class="card-panel carousel-item">Tarjeta 1</div>
        <div class="card-panel carousel-item">Tarjeta 2</div>
        <div class="card-panel carousel-item">Tarjeta 3</div>
        <div class="card-panel carousel-item">Tarjeta 4</div>
        <div class="card-panel carousel-item">Tarjeta 5</div>
    </div>

@stop


@section('scripts')

    <script>
        $(document).ready(function () {
            $('.carousel').carousel();
        });
    </script>

@stop

