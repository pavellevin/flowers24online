@extends('layouts.main')

{{--META--}}
@section('title', 'Доставка цветов')
@section('description', 'Изготавливаем и доставляем букеты цветов! Звоните прямо сейчас')
@section('keywords', 'keywords')


{{--BODY--}}
@section('body')
    <body>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <div id="full-slider" class="slide-v3">
            @foreach($products as $product)
            <div class="slider-img full-slide">
                <div class="row">
                    <div class="w50 w50-1 col-sm-6" data-animation="fadeInRight" data-delay="0.5s">
                        <div class="content">
                            <div class="box-img">
                                <div class="content-item">
                                    <p data-animation="fadeInRight" data-delay="1s">из каталога: {{ $product->catalog->name }}</p>
                                    <h5 class="title-h5" data-animation="fadeInRight" data-delay="1.2s"><a href=""
                                                                                                           title="">{{ $product->name }}</a></h5>
                                    <div class="bottom" data-animation="fadeInRight" data-delay="1.4s">
                                        <span class="old-price"><del>₴{{ $product->old_price }}</del></span>
                                        <span class="price">₴{{ $product->price }}</span>
                                    </div>
                                    <div class="btn-web" data-animation="fadeInRight" data-delay="1.6s">
                                        <a href="{{ route('product', $product->slug) }}" title="">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w50 col-sm-6" data-animation="fadeInLeft" data-delay="0.5s">
                        <img src="{{ $product->getFirstMediaUrl('products', 'main_img') }}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
@endsection

@section('footer')
    @include('shared.site.footer_page')
@endsection