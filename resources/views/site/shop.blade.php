@extends('layouts.main')
{{--META--}}
@section('title', 'Наш магазин')
@section('description', 'Каталог всех товаров')
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
                    {{ Breadcrumbs::render('shop') }}
                </div>
            </div>
        </section>
@endsection

{{--CONTENT--}}
@section('content')
    @include('shared.site.products_grid_content')
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection