@extends('layouts.main')

{{--META--}}
@section('title', 'Оплата заказа')
@section('description', 'Здесь происходит оплата заказа')
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
                    {{ Breadcrumbs::render('show_checkout') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section id="main-content">
            <div class="container">
                @if(!Auth::check())
                    <div class="checkout-form">
                        {{--<div class="form-top row">--}}
                        {{--<div class="col-md-6">--}}
                        {{--<div class="text-link return-custom">--}}
                        {{--<span>Вы еще не зарегистрированы?</span>--}}
                        {{--<a href="{{ route('register') }}">Кликните сюда для регистрации</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                        {{--<div class="text-link add-coupon">--}}
                        {{--<span>У вас есть наш купон??</span>--}}
                        {{--<a href="#">Кликните сюда, чтобы ввести его код</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-center row">
                            <div class="col-md-6">
                                <div class="desc-coupon">
                                    <span>{{ __('messages.before checkout') }}</span>
                                </div>
                            </div>
                            <div class="text-link return-custom">
                                <span>{{ __('messages.not registered yet?') }}</span>
                                <a href="{{ route('register') }}">{{ __('messages.click here to register') }}</a>
                            </div>
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-coupon">--}}
                            {{--<input type="text" name="text coupon" placeholder="Код купона">--}}
                            {{--<div class="btn-coupon btn-theme btn-medium"><a href="#">Подтвердить</a></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <form action="{{ route('login_checkout') }}" method="POST">
                            @csrf
                            <div class="form-bottom row">
                                <div class="col-md-6">
                                    <div class="form-login">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email"
                                               placeholder="Email *" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        {{--<input type="text" name="username" placeholder="Username or Email *">--}}
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password"
                                               placeholder="Password *">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        {{--<input type="text" name="password" placeholder="Password *">--}}
                                        <div class="action-login">
                                            <button type="submit" class="btn-login btn-theme btn-medium">
                                                <span>{{ __('messages.login') }}</span>
                                            </button>
                                            {{--<div class="btn-login btn-theme btn-medium">--}}
                                            {{--<a href="#">Login</a>--}}
                                            {{--</div>--}}
                                            <div class="text-link">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">{{ __('messages.forgot your password?') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </form>
                    </div>
                @endif
                <cart-checkout :cities="{{json_encode($cities)}}"
                               :login_user="{{ json_encode(['isLoggedIn'=>auth()->check() ? true : false, 'user'=>auth()->check() ? auth()->user() : null]) }}"
                               :periods="{{json_encode($periods)}}"
                               :dopproducts="{{json_encode($dopproducts)}}"
                               :nearestperiod="{{json_encode($nearestperiod)}}"
                               :service_surprise="{{json_encode($service_surprise)}}"
                               :service_photo="{{json_encode($service_photo)}}"
                               :service_branded_card="{{json_encode($service_branded_card)}}"
                               :service_exact_time="{{json_encode($service_exact_time)}}"
                               :service_morning_evening_delivery="{{json_encode($service_morning_evening_delivery)}}"
                               :coast_delivery="{{json_encode($coast_delivery)}}">
                </cart-checkout>
            </div>
        </section>
@endsection

{{--FOOTER--}}
{{--@section('footer')--}}
{{--@include('shared.site.footer_page')--}}
{{--@endsection--}}

{{--SCRIPTS--}}
@section('scripts_uniq')
    @include('shared.site.scripts_for_checkout')
@endsection