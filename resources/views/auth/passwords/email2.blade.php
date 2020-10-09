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
                    {{ Breadcrumbs::render('password.request') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.reset password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.send password reset link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
