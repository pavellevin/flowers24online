@extends('layouts.main')

{{--META--}}
@section('title', 'Вход')
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
                    {{--                    {{ Breadcrumbs::render('new') }}--}}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section id="main-content">
            <div class="container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="inner row">
                        <div class="content-left col-md-8 col-sm-8">
                            {{--<div class="title-heading">--}}
                                {{--<span>Customer Details</span>--}}
                            {{--</div>--}}
                            <div class="form-billing-details row">
                                <div class="col-md-6">
                                    <label>{{ __('E-Mail') }} *</label>
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
                                    <label>{{ __('Remember Me') }}</label>
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('Password') }} *</label>
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
                                    <button type="submit" class="proceed-checkout">
                                        <span>{{ __('Enter') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="content-right col-md-4 col-sm-4">
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