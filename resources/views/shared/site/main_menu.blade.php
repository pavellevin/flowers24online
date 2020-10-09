<div class="main-menu">
    <nav class="navbar collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="level1 active hassub megamenu-default">
                <a href="javascript:;">{{ __('messages.catalog') }}</a>
                <div class="submenu-v1">
                    <img src="/images/banner/banner_menu.jpg" alt="banner menu">
                    <div class="row margin-b-30">
                        @foreach($catalog as $cat)
                            <div class="col-md-3 h-70">
                                <div class="title-submenu">
                                    <span><a href="{{route('catalog', $cat->slug)}}">{{ $cat->name }}</a></span>
                                </div>
                                {{--<ul>--}}
                                    {{--@foreach($cat->products as $product)--}}
                                        {{--<li><a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a></li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="level1">
                <a href="{{ route('about_us')}}">{{ __('messages.about us') }}</a>
            </li>
            <li class="level1 megamenu-fullwidth">
                <a href="{{ route('news') }}">{{ __('messages.news') }}</a>
                <div class="submenu-v1">
                    <div class="row margin-b-30">
                        <div class="col-md-8">
                            <div class="lever-1 margin-b-30">
                                <div class="title-submenu">
                                    <span>{{ __('messages.news') }}</span>
                                </div>
                                <ul>
                                    @foreach($news as $new)
                                    <li><a href="{{ route('new', $new->slug) }}">{{ $new->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            {{--<div class="lever-1">--}}
                                {{--<div class="title-submenu">--}}
                                    {{--<span>Новость 2</span>--}}
                                {{--</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="/new">Новость 2</a></li>--}}
                                    {{--<li><a href="/new">Новость 2</a></li>--}}
                                    {{--<li><a href="/new">Новость 2</a></li>--}}
                                    {{--<li><a href="/new">Новость 2</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                        {{--<div class="col-md-3">--}}
                            {{--<div class="lever-1 margin-b-30">--}}
                                {{--<div class="title-submenu">--}}
                                    {{--<span>Новость 3</span>--}}
                                {{--</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="/new">Новость 3</a></li>--}}
                                    {{--<li><a href="/new">Новость 3</a></li>--}}
                                    {{--<li><a href="/new">Новость 3</a></li>--}}
                                    {{--<li><a href="/new">Новость 3</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="lever-1">--}}
                                {{--<div class="title-submenu">--}}
                                    {{--<span>Новость 4</span>--}}
                                {{--</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="/new">Новость 4</a></li>--}}
                                    {{--<li><a href="/new">Новость 4</a></li>--}}
                                    {{--<li><a href="/new">Новость 4</a></li>--}}
                                    {{--<li><a href="/new">Новость 4</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--<div class="lever-1 margin-b-30">--}}
                                {{--<div class="title-submenu">--}}
                                    {{--<span>Новость 5</span>--}}
                                {{--</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="/new">Новость 5</a></li>--}}
                                    {{--<li><a href="/new">Новость 5</a></li>--}}
                                    {{--<li><a href="/new">Новость 5</a></li>--}}
                                    {{--<li><a href="/new">Новость 5</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="lever-1">--}}
                                {{--<div class="title-submenu">--}}
                                    {{--<span>Новость 6</span>--}}
                                {{--</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="/new">Новость 6</a></li>--}}
                                    {{--<li><a href="/new">Новость 6</a></li>--}}
                                    {{--<li><a href="/new">Новость 6</a></li>--}}
                                    {{--<li><a href="/new">Новость 6</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-md-4">
                            <img src="/images/banner/banner_menu_01.jpg" alt="banner menu">
                        </div>
                    </div>
                </div>
            </li>
            <li class="level4">
                <div class="dropdown-phone">
                    <span>{{ __('messages.contacts') }}</span>
                    <i class="pe-7s-angle-down"></i>
                    <div class="dropdown-content">
                        <p>+380111111111</p>
                        <p>+380111111111</p>
                        <p>+380111111111</p>
                        <p>flowers24@gmail.com</p>
                    </div>
                </div>
                {{--<a href="{{ route('contacts') }}">Контакты</a>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
            </li>
            <li class="level4">
                <div class="dropdown-phone">
                    <span>{{ mb_strtoupper(app()->getLocale()) }}</span>
                    <i class="pe-7s-angle-down"></i>
                    <div class="dropdown-content">
                    <a href="{{route('locale', 'uk')}}"><p>UA</p></a>
                    <a href="{{route('locale', 'ru')}}"><p>RU</p></a>
                    <a href="{{route('locale', 'en')}}"><p>EN</p></a>
                    </div>
                </div>
                {{--<a href="{{ route('contacts') }}">Контакты</a>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
                {{--<span>+38XXXXXXXXXX</span>--}}
            </li>
        </ul>
    </nav>
</div>
