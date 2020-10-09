@extends('layouts.main')
{{--META--}}
@section('title', 'Все наши новости')
@section('description', 'Перечень наших новостей')
@section('keywords', 'keywords')


{{--BODY--}}
@section('body')
    <body class="blog-v2">
    @endsection

    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('news') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        {{--BLOG BANNER--}}
        {{--<section class="banner-blog">--}}
        {{--<div class="img_banner">--}}
        {{--<h4 class="banner-h4">OUR BLOG</h4>--}}
        {{--<ul class="breadcrumb">--}}
        {{--<li><a href="">Home</a></li>--}}
        {{--<li class="active"><a href="">Our Blog</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</section>--}}
        {{--BLOG ZIGZAG--}}
        <section class="blog-zigzag ">
            <div class="container">
                <div class="wpb_wrapper">
                    <div class="row">
                        @foreach($news as $key => $new)
                            @if($key % 2 == 0)
                                <div class="item-zigzag clearfix">
                                    <div class="col-sm-6 col-xs-12 col-sm-push-6">
                                        <div class="post-standard">
                                            <a href="{{ route('new', $new->slug) }}">
                                                <figure><img src="{{ $new->getFirstMediaUrl('news') }}"
                                                             alt="{{ $new->name }}"
                                                             class="img-responsive"></figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 feature-content col-sm-pull-6">
                                        <div class="oct_top_featured_content">
                                            <span class="oct_day">{{ $new->created_at }}</span>
                                        </div>
                                        <h3 class="oct_blog_title"><a
                                                    href="{{ route('new', $new->slug) }}">{{ $new->name }}</a></h3>
                                        <p class="k_blog_content">{{ $new->text }}</p>
                                        <div class=" btn-web ">
                                            <a href="{{ route('new', $new->slug) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="item-zigzag clearfix">
                                    <div class="col-sm-6 col-xs-12 ">
                                        <div class="post-standard">
                                            <a href="{{ route('new', $new->slug) }}">
                                                <figure><img src="{{ $new->getFirstMediaUrl('news', 'news') }}"
                                                             alt="{{ $new->name }}"
                                                             class="img-responsive"></figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 feature-content ">
                                        <div class="oct_top_featured_content">
                                            <span class="oct_day"{{ $new->created_at }}</span>
                                        </div>
                                        <h3 class="oct_blog_title"><a
                                                    href="{{ route('new', $new->slug) }}">{{ $new->name }}</a></h3>
                                        <p class="k_blog_content">{{ $new->text }}</p>
                                        <div class=" btn-web ">
                                            <a href="{{ route('new', $new->slug) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="btn-web-1 btn-web text-center">
                            <a href="#" title=""><i class="fa fa-refresh fa-spin "></i>Load More</a>
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
