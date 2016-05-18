<!-- preview -->
{!! HTML::style('assets/css/bannerLink.css') !!}


<!-- Main card -->
<div class="banner card z-depth-2">
    <img class="responsive-img image-small" style="margin-bottom: -6px;"
         src="https://s3-us-west-1.amazonaws.com/enera-publishers/items/{!! $cam->content['images']['small'] !!}">
</div>
<!-- Main card -->

<div class="card-panel center-align actions-card">
    <a class="btn waves-effect waves-light nav-btn indigo z-depth-2" href="javascript:void(0)"
       success_url="{{Input::get('base_grant_url') }}">
            <span class="white-text left">
                Navegar en Internet
            </span>
        <i class="right material-icons">wifi</i>
    </a>
</div>
<!-- login buttons -->





