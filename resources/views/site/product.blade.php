@extends('layouts.main')

{{--META--}}
@section('title', 'Заказать '.$product->name)
@section('description', 'Заказать '.$product->name.' по самой лучшей цене! Бесплатная доставка! Звоните прямо сейчас')
@section('keywords', 'keywords')

{{--BODY--}}
@section('body')
    <body class="single-product">
    @endsection
    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('product', $product) }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section id="main-content">
            <div class="single-product-detail row">
                <div class="col-md-6">
                    <div class="single-product-img">
                        <div class="pro-slide js-product-slider">
                            @foreach($product->getMedia('products') as $img)
                                <div class="item">
                                    <img src="{{ $img->getUrl('main_img') }}"
                                         class="img-responsive" alt="{{$product->name}}"
                                         title="images {{$product->name}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="pro-slide-carousel js-carousel-product">
                            @foreach($product->getMedia('products') as $img)
                                <div class="item">
                                    <img src="{{ $img->getUrl('thumb') }}" class="img-responsive"
                                         alt="{{$product->name}}"
                                         title="images {{$product->name}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-product-infor">
                        <div class="pro-title">
                            <h1>{{ $product->name }}</h1>
                        </div>
                        <div class="pro-star">
                            <div class="star-rating">
                                <span class="fa fa-star-o" data-rating="1"></span>
                                <span class="fa fa-star-o" data-rating="2"></span>
                                <span class="fa fa-star-o" data-rating="3"></span>
                                <span class="fa fa-star-o" data-rating="4"></span>
                                <span class="fa fa-star-o" data-rating="5"></span>
                                <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                            </div>
                        </div>
                        <div class="pro-price">
                            @if(!empty($product->old_price))
                                <span class="old-price"><del>{{ $product->old_price }} {{ __('messages.uah') }}</del></span>@endif
                            <span class="price">{{ $product->price }} {{ __('messages.uah') }}</span>
                        </div>
                        {{--<div class="pro-option-attribute">--}}
                        {{--<div class="pro-quantity">--}}
                        {{--<div class="title"><span>Количество</span></div>--}}
                        {{--<input type="number" min="1" max="10000" step="1" value="1">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="pb-50">{{ __('messages.nearest delivery time') }} {{ $nearestperiod }}</div>
                        <div class="pro-action">
                            <div class="btn-theme btn-medium addcart">
                                <a href="javascript:;" @click="addToCart({{json_encode($product)}})">{{ __('messages.buy') }}</a>
                            </div>
                            <div class="pro-wishlist" data-toggle="modal" data-target="#reviewModal">
                                <a href="javascript:;"><i class="pe-7s-star"></i></a>
                            </div>

                            <!-- Modal -->
                            <form action="{{ route('add_review')}}" method="post">
                                @csrf
                                <div class="modal" id="reviewModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title"
                                                    id="exampleModalLongTitle"> @if(Auth::check()){{ __('messages.review') }} @else Вам необходимо авторизироваться! @endif</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input class="form-control" type="hidden" name="product_id"
                                                       value="{{ $product->id }}">
                                                <input class="form-control" type="hidden" name="user_id"
                                                       value="{{ Auth::id() }}">
                                                <label for="review">{{ __('messages.your review') }}</label>
                                                <br/>
                                                <textarea rows="6" cols="90%" name="review" required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('messages.close') }}
                                                </button>
                                                <button class="btn btn-primary">{{ __('messages.add review') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="pro-tabs">
                            <div class="tabs-desc">
                                <ul class="navbar-tabs">
                                    <li class="dropdown open">
                                        <div class="dropdowndesc">
                                            <span>{{ __('messages.description') }}</span>
                                            <i class="icon-caret"></i>
                                        </div>
                                        <div class="dropdown-menu">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </li>
                                    {{--<li class="dropdown">--}}
                                    {{--<div class="dropdowndesc">--}}
                                    {{--<span>Custom tab</span>--}}
                                    {{--<i class="icon-caret"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="dropdown-menu">--}}
                                    {{--<p>{{ $product->description }}</p>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    <li class="dropdown">
                                        <div class="dropdowndesc">
                                            <span>{{ __('messages.review') }}</span>
                                            <i class="icon-caret"></i>
                                        </div>
                                        <div class="dropdown-menu">
                                            @foreach($product->reviews as $review)
                                                <div class="review_item">
                                                    <span class="review_user">{{$review->name}}</span>
                                                    <span class="review_date">{{$review->created_at}}</span>
                                                    <p class="review_text">{{ $review->pivot->text }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{--<div class="pro-share">--}}
                        {{--<span class="title">Share this :</span>--}}
                        {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-dribbble"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-skype"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-pinterest"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-facebook-square"></i></a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </section>
    @widget('recommended_products')
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection