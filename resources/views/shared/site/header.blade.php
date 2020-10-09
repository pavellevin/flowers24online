<header id="main-header" class="header-v3 hidden-sm hidden-xs">
    <div class="container-fluid">
        <div class="inner row">
            <div class="logo col-lg-2 col-md-2">
                <a href="/" title="logo"><img alt="logo-theme" src="/images/logo.png" class="img-responsive"></a>
            </div>
            <div class="header-right col-lg-10 col-md-10">
                {{--Start Main Menu --}}
                @include('shared.site.main_menu')
                {{--End Main Menu --}}

                {{--Start Search Popup --}}
                @include('shared.site.search_popup')
                {{--End Search Popup -->--}}

                {{--Start Shopping cart--}}
                <cart-header></cart-header>
{{--                @include('shared.site.shopping_card')--}}
                {{--End Shopping cart --}}
            </div>
        </div>
    </div>
</header>
