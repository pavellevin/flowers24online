<header id="header_mobile" class="header-mobile-default hidden-lg hidden-md">
    <div class="header-top">
        <div class="container">
            <div class="logo text-center">
                <a href="/" title="logo"><img alt="logo-theme" src="/images/mobile-logo.png" class="img-responsive"></a>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="inner">
                <div class="header-main">
                    <div class="main-left">
                        <button data-toggle="offcanvas" class="btn btn-offcanvas btn-toggle-canvas offcanvas"
                                type="button">
                            <i class="ion ion-android-menu"></i>
                        </button>
                    </div>
                    <div class="main-right">
                        <div class="search-popup search_modal search">
                            <a href="#" class="tp_btn_search" data-toggle="modal" data-target="#Searchmobile">
                                <i class="pe-7s-search"></i>
                            </a>
                            <div id="Searchmobile" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                    class="pe-7s-close"></span></button>

                                        <form method="post" class="searchform" action="{{ route('search') }}">
                                            {{ csrf_field() }}
                                            <div class="pbr-search input-group">
                                                <input name="search" maxlength="40"
                                                       class="form-control input-large input-search" size="20"
                                                       placeholder="{{ __('messages.search') }}…" type="text">
                                                <span class="input-group-addon input-large btn-search">
                                                        <input value="" type="submit">
                                                    </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-phone mobile-contacts">
                            <span>{{ mb_strtoupper(app()->getLocale()) }}</span>
                            <div class="dropdown-content">
                                <a href="{{route('locale', 'uk')}}"><p>UA</p></a>
                                <a href="{{route('locale', 'ru')}}"><p>RU</p></a>
                                <a href="{{route('locale', 'en')}}"><p>EN</p></a>
                            </div>
                        </div>

                        @include('shared.site.menu_auth')

                        {{--Start Shopping cart --}}
                        {{--@include('shared.mobile.shopping_card_mobile')--}}
                        <cart-header-mobile></cart-header-mobile>
                        {{--End Shopping cart --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>