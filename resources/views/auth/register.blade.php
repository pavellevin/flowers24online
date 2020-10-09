@extends('layouts.main')

{{--META--}}
@section('title', 'Регистрация')
@section('description', 'Среди зарегистрированных пользователей постоянные конкурсы')
@section('keywords', 'keywords')

{{--BODY--}}
@section('body')
    <body class="checkout-page">
    @endsection

    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('register') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section id="main-content">
            <div class="container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="inner row">
                        <div class="content-left col-md-8 col-sm-8">
                            <div class="title-heading">
                                <h1>{{ __('messages.user data') }}</h1>
                            </div>
                            <div class="form-billing-details row">
                                <div class="col-md-6">
                                    <label>{{ __('messages.name') }} *</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6 pl-0">
                                        <label>{{ __('messages.birthday') }} *</label>
                                        <input type="date" name="birthday">
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <label>{{ __('messages.gender') }} *</label>
                                        <select name="gender">
                                            <option value="0">{{ __('messages.female') }}</option>
                                            <option value="1">{{ __('messages.male') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('messages.e-mail address') }} *</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('messages.phone') }} *</label>
                                    <input id="email" type="phone"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('messages.password') }} *</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('messages.confirm password') }} *</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-md-6 col-md-offset-6 mt-25">
                                    <button type="submit" class="proceed-checkout">
                                        <span>{{ __('messages.confirm') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="content-right col-md-4 col-sm-4">
                            {{--<div class="widget widget-your-order">--}}
                            {{--<div class="title-heading">--}}
                            {{--<span>Your Order</span>--}}
                            {{--</div>--}}
                            {{--<div class="product-sidebar">--}}
                            {{--<div class="products">--}}
                            {{--<div class="product-img-wrap">--}}
                            {{--<img src="images/product/img_sidebar01.jpg" alt="" class="img-reponsive">--}}
                            {{--</div>--}}
                            {{--<div class="inner-left">--}}
                            {{--<div class="product-name">--}}
                            {{--<a href="#">Harman Kardon Onyx Studio </a>--}}
                            {{--</div>--}}
                            {{--<div class="product-qty">--}}
                            {{--<span>x1</span>--}}
                            {{--</div>--}}
                            {{--<div class="product-price">--}}
                            {{--<span>$295.00</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="products">--}}
                            {{--<div class="product-img-wrap">--}}
                            {{--<img src="images/product/img_sidebar02.jpg" alt="" class="img-reponsive">--}}
                            {{--</div>--}}
                            {{--<div class="inner-left">--}}
                            {{--<div class="product-name">--}}
                            {{--<a href="#">Harman Kardon Onyx Studio </a>--}}
                            {{--</div>--}}
                            {{--<div class="product-qty">--}}
                            {{--<span>x1</span>--}}
                            {{--</div>--}}
                            {{--<div class="product-price">--}}
                            {{--<span>$295.00</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="widget widget-cart-totals">--}}
                            {{--<div class="title-heading">--}}
                            {{--<span>Cart Totals</span>--}}
                            {{--</div>--}}
                            {{--<div class="form-cart-totals">--}}
                            {{--<div class="content-top">--}}
                            {{--<div class="title">Subtotal</div>--}}
                            {{--<span class="price">$560.00</span>--}}
                            {{--</div>--}}
                            {{--<div class="content-center">--}}
                            {{--<div class="title">Shipping</div>--}}
                            {{--<div class="radio">--}}
                            {{--<label><input type="radio" name="optradio" checked>Free Shipping</label>--}}
                            {{--</div>--}}
                            {{--<div class="radio">--}}
                            {{--<label><input type="radio" name="optradio">Standard</label>--}}
                            {{--<span>$20.00</span>--}}
                            {{--</div>--}}
                            {{--<div class="radio">--}}
                            {{--<label><input type="radio" name="optradio">Local Pickup</label>--}}
                            {{--</div>--}}
                            {{--<div class="shipping">--}}
                            {{--<a href="#">Calculate Shipping</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="content-bottom">--}}
                            {{--<div class="total">Total</div>--}}
                            {{--<span class="price">$560.00</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div role="button" class="proceed-checkout btn-theme btn-lage"><a href="javascript:;">Proceed--}}
                            {{--to Register</a></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection