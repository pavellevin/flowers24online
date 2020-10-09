@extends('layouts.main')

{{--META--}}
@section('title', 'О нас')
@section('description', 'Мы доставляем радость! Звоните прямо сейчас')
@section('keywords', 'keywords')

{{--BODY--}}
@section('body')
    <body class="about-page">
    @endsection

    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('about_us') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section class="banner-header about-us"></section>
        <section class="about-content">
            <div class="container">
                <div class="about-top">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="post-type">
                                <div class="inner">
                                    <span>The most important things are not things so we’ll design experiences.</span>
                                    <div class="signature">by EngoCreative</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="desc-about">
                                <div class="title-heading">
                                    Who We Are
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen
                                    book. </p>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="desc-about">
                                <div class="title-heading">
                                    Vision
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen
                                    book. </p>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions...</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="desc-about">
                                <div class="title-heading">
                                    Mission
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen
                                    book. </p>
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonial">
            <div class="container-fluid">
                <div class="testimonials-body">
                    <div class="bg-testimonials"></div>
                    <div class="testimonial-content carousel-slide">
                        <div class="slider-testimonial">
                            <div class="testimonials-quote">
                                <i class="fa fa-quote-left"></i>
                                <p>I rarely write reviews for products but with the EngoCreative, I am more than
                                    grateful. The site is fully customizable and you can really feel like playing while
                                    designing the site!</p>
                            </div>
                            <div class="testimonials-profile">
                                <h4 class="name">Janathan Vance</h4>
                                <div class="job">CEO & Founder EngoCreative</div>
                            </div>
                        </div>
                        <div class="slider-testimonial">
                            <div class="testimonials-quote">
                                <i class="fa fa-quote-left"></i>
                                <p>I rarely write reviews for products but with the EngoCreative, I am more than
                                    grateful. The site is fully customizable and you can really feel like playing while
                                    designing the site!</p>
                            </div>
                            <div class="testimonials-profile">
                                <h4 class="name">Janathan Vance</h4>
                                <div class="job">CEO & Founder EngoCreative</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="brand">
            <div class="container">
                <div class="inner">
                    <div class="brand-content owl-carousel js-owl-brand owl-theme">
                        <div class="brand-item">
                            <a href="#"><img src="images/brand/brand01.jpg" class="img-responsive" alt="brand1"></a>
                        </div>
                        <div class="brand-item">
                            <a href="#"><img src="images/brand/brand02.jpg" class="img-responsive" alt="brand2"></a>
                        </div>
                        <div class="brand-item">
                            <a href="#"><img src="images/brand/brand03.jpg" class="img-responsive" alt="brand3"></a>
                        </div>
                        <div class="brand-item">
                            <a href="#"><img src="images/brand/brand04.jpg" class="img-responsive" alt="brand4"></a>
                        </div>
                        <div class="brand-item">
                            <a href="#"><img src="images/brand/brand05.jpg" class="img-responsive" alt="brand5"></a>
                        </div>
                        <div class="brand-item">
                            <a href="#"><img src="images/brand/brand03.jpg" class="img-responsive" alt="brand3"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection
