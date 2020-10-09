<div id="pbr-off-canvas" class="pbr-off-canvas sidebar-offcanvas hidden-lg hidden-md">
    <div class="pbr-off-canvas-body">
        <div class="offcanvas-head">
            <button type="button" class="btn btn-close btn-toggle-canvas" data-toggle="offcanvas">
                <i class="pe-7s-close-circle"></i>
            </button>
            <span>Menu</span>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static">
            <ul class="nav navbar-nav">
                <li class="level1 active hassub">
                <a data-toggle="collapse" href="#menuCatalog" role="button" aria-expanded="false" aria-controls="menuCatalog">
                    {{ __('messages.catalog') }}
                    </a>
                </li>
                <div class="collapse" id="menuCatalog">
                    <div class="menu menu-body">
                        @foreach($catalog as $cat)
                            <p><a href="/catalog/{{$cat->slug}}">{{$cat->name}}</a></p>
                        @endforeach
                    </div>
                </div>
                <li class="level1 hassub">
                    <a href="/about-us">{{ __('messages.about us') }}</a>
                </li>
                <li class="level1 hassub">
                    <a href="/news">{{ __('messages.news') }}</a>
                </li>
                <li class="level1 hassub">
                    <a href="/contacts">{{ __('messages.contacts') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
{{--Search popup content--}}
@include('shared.site.search_popup_content')