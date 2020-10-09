<!DOCTYPE html>
<html lang="en">

<head>
    {{--META--}}
    @include('shared.site.metas')
    {{--GOOGLE FONT--}}
    @include('shared.site.fonts')
    {{--CSS LIBRARY--}}
    @include('shared.site.styles')
</head>
<div id="app">
    {{--BODY--}}
    @yield('body')

    {{--<div id="page-preloader">--}}
    {{--<div class="spinner">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--HEADER --}}
    @include('shared.site.header')

    {{--HEADER MOBILE--}}
    @include('shared.mobile.header_mobile')

    {{--HEADER INFO--}}
    @include('shared.site.header_info')

    {{--HEADER FILTER--}}
    @yield('header_filter')

    {{--BREADCRUMB--}}
    @yield('breadcrumb')

    {{--@include('shared.site.flash_message')--}}
    @include('flash::message')

    {{--CONTENT--}}
    @yield('content')

    {{--FOOTER--}}
    @yield('footer')

    {{--MENU OFFCANVAS--}}
    @include('shared.site.menu_offcanvas')

    {{--SCOLL TOP--}}
    @include('shared.site.scroll_top')
</div>

{{--SCRIPTS--}}
@include('shared.site.scripts')

{{--SCRIPTS_ADD--}}
@yield('scripts_uniq')
</body>

</html>