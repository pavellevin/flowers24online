@extends('layouts.main')

{{--META--}}
@section('title', 'Сброс пароля')
@section('description', 'Здесь происходит оплата сброс пароля')
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
                    {{ Breadcrumbs::render('password.request') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section id="main-content">
            <div class="container">
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
                                    {{ __('auth.reset password') }}
                                </div>
                            </div>
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-coupon">--}}
                            {{--<input type="text" name="text coupon" placeholder="Код купона">--}}
                            {{--<div class="btn-coupon btn-theme btn-medium"><a href="#">Подтвердить</a></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <form action="{{ route('password.email') }}" method="POST">
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
                                        <div class="action-login">
                                            <button type="submit" class="btn-login btn-theme btn-medium">
                                                <span>{{ __('messages.send password reset link') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
@endsection