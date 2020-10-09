@extends('layouts.main')

{{--META--}}
@section('title', 'Каталог '.$catalog->name)
@section('description', 'Все композиции из '.$catalog->name.'. Звоните прямо сейчас')
@section('keywords', 'keywords')

{{--BODY--}}
@section('body')
    <body class="page-shop page-shop-v3">
    @endsection

    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('catalog', $catalog) }}
                </div>
            </div>
        </section>
@endsection

{{--HEADER FILTER--}}
@section('header_filter')
    @widget('header_filter', ['slug' => $catalog->slug, 'filters' => $filters])
@endsection

{{--CONTENT--}}
@section('content')
    {{--@if(sizeof($products))--}}
    @include('shared.site.products_grid_content')
    {{--@else--}}
    {{--<div class="container pb-50">--}}
    {{--<div class="info"><h3>По заданным критериям товара не найдено!</h3></div>--}}
    {{--</div>--}}
    {{--@endif--}}
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection

{{--SCRIPTS--}}
@section('scripts_uniq')
    @include('shared.site.scripts_for_catalog')
@endsection