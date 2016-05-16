@extends('layouts.mainmat')

@section('title', 'Perfil')


@section('head_scripts')
    {!! HTML::style('assets/css/profile_v2.css') !!}

@stop


@section('content')

    <div class="card profile">
        <div class="card-image">

            <div class="profile-gradient">
                <img class="profile-image" src="https://s3-us-west-1.amazonaws.com/enera-publishers/avatars/{!! isset($user->image) ? $user->image : 'user.png'!!}" alt="User avatar"/>
            </div>

            <span class="card-title">{!! $user->name['first'] . " " . $user->name['last'] !!}</span>
        </div>

        <div class="card-content">

            <!-- edit FAB -->
            <a class="profile-edit z-depth-2 right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>


            <h5 class="flow-text truncate">
                <i class="material-icons prefix">email</i> &nbsp {{$user->email}}
            </h5>

            {{--<div class="divider"></div>--}}

            <h5 class="flow-text">
                <i class="material-icons">phone</i> &nbsp {{$user->phones['number']}}
            </h5>


        </div>

    </div>

@stop


@section('scripts')



@stop

