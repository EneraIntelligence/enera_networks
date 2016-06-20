<div class="section image-card">
    <img class="responsive-img" src="{{asset('images/dashboard/imagen_nodos.jpg')}}" alt="">
</div>

<div class="section" style="font-size: 25px; padding-top:0;">
    <span style="font-weight: 400;">Nodos</span>
</div>

<ul class="collection" style="border: none;">
    @foreach($branches as $data)
        <li class="collection-item grey lighten-2" style="margin: 10px 0 10px 0; position: relative;">
            <h5 class="black-text center-align" style="margin-top: 0;">{{$data['name']}}</h5>
            <p class="black-text p-small">> Usuarios:{{$data['name']}}</p>
            <p class="black-text p-small">> Conexiones:{{$data['name']}}</p>
            <a class="waves-effect waves-teal btn-flat" style="position: absolute;bottom: 25px; right: 10px;"><i
                        class="material-icons">&#xE89E;</i></a>
        </li>
    @endforeach
</ul>