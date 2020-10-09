<header id="main-header" class="header-v3 hidden-sm hidden-xs">
    <div class="container-fluid">
        <div class="inner row">
            <div class="logo col-lg-3 col-md-3">
                <a href="/" title="logo"><img alt="logo-theme" src="/images/logo.png" class="img-responsive"></a>
            </div>
            <div class="header-right col-lg-9 col-md-9">
                {{--Start Main Menu --}}
                @include('shared.site.main_menu')

                {{--End Main Menu --}}
                {{--Start Shopping cart--}}
                {{--                @include('shared.site.shopping_card')--}}
                {{--End Shopping cart --}}
                {{--Start Search Popup --}}
                <div class="other-menu">
                    @include('shared.site.search_popup')
                    @include('shared.site.menu_lang')
                    @include('shared.site.menu_auth')
                    <cart-header></cart-header>

                </div>
                {{--End Search Popup -->--}}

            </div>
        </div>
    </div>
</header>
