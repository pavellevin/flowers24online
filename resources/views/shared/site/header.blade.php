<header id="main-header" class="header-v3 hidden-sm hidden-xs">
    <div class="container-fluid">
        <div class="inner row">
            <div class="logo col-lg-2 col-md-2">
                <a href="/" title="logo"><img alt="logo-theme" src="/images/logo.png" class="img-responsive"></a>
            </div>
            <div class="header-right col-lg-8 col-md-8">
                {{--Start Main Menu --}}
                @include('shared.site.main_menu')
                {{--End Main Menu --}}
            </div>
                <div class="header-right col-lg-2 col-md-2">
                <div class="inner row">
                    <div class="col-lg-12 col-md-12">
                {{--Start Shopping cart--}}
                <cart-header></cart-header>
{{--                @include('shared.site.shopping_card')--}}
                {{--End Shopping cart --}}
                {{--Start Search Popup --}}
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="other-menu">
                        @include('shared.site.search_popup')
                        @include('shared.site.menu_lang')
                        @include('shared.site.menu_auth')
                        </div>
                    </div>
                </div>
                {{--End Search Popup -->--}}

            </div>
        </div>
    </div>
</header>
