@extends('layouts.main')
{{--META--}}
@section('title', 'Корзина')
@section('description', 'Содержимое корзины ')
@section('keywords', 'keywords')


{{--BODY--}}
@section('body')
    <body class="cart-page">
    @endsection

    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('shopping_card') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <cart></cart>
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection