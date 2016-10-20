@extends('layouts.mainmat')

@section('title', 'Reportes Usuarios')


@section('head_scripts')
    <style>
        .progress{
            margin: 0;
            height: 5px;
        }
    </style>

@stop


@section('content')

    <div class="container">
        <div class="row">
            <div class="col s6" id="container" style="background-color: white;">
                <div class="progress" style="display: block;" id="loader">
                    <div class="indeterminate"></div>
                </div>
                <form type="POST">
                    First name:<br>
                    <input type="text" name="firstname" id="name" value="Mickey">
                    <br>
                    Last name:<br>
                    <input type="text" name="lastname" id="lastname" value="Mouse">
                    <br><br>
                    <button onclick="myFunction(event)" value="Submit"> Ajax</button>
                </form>
                <p></p>
            </div>
        </div>
    </div>

@stop


@section('scripts')
    <script>
        var name = document.getElementById('name').value;
        $( "p" ).text( name );
        function myFunction(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                async: true,
                url: '{{ route('test') }}',
                dataType: "JSON",
                data: {name: name, _token: "{!! session('_token') !!}"},
                success: function (data) {
                    $( "#name" )
                            .keyup(function() {
                                var value = $( this ).val();
                                $( "p" ).text( data.name );
                            })
                            .keyup();
                },
                error: function error(xhr, textStatus, errorThrown) {
                    alert('Remote sever unavailable. Please try later');
                },
                beforeSend: function(data){
                    document.getElementById("loader").style.display = "block";
                },
                complete: function(){
                    document.getElementById("loader").style.display = "none";
                }
            });
        }
    </script>
@stop

