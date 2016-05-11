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
            <a class="profile-edit z-depth-2 right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>

            <p>
                <i class="material-icons prefix">email</i> &nbsp {{$user->email}}
            </p>

            <p>
                <i class="material-icons">phone</i> &nbsp {{$user->phones['number']}}
            </p>
        </div>

    </div>

@stop


@section('scripts')



@stop

