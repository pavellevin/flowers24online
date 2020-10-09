@extends('layouts.main')

{{--META--}}
@section('title', 'Наши контакты')
@section('description', 'Вы можете с нами связаться по указанным данным')
@section('keywords', 'keywords')

{{--BODY--}}
@section('body')
    <body>
    @endsection

    {{--BREADCRUMB  --}}
    @section('breadcrumb')
        <section id="breadcrumb" class="breadcrumb-v2">
            <div class="container">
                <div class="breadcrumb-content">
                    {{ Breadcrumbs::render('contacts') }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section class="contact-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-left">
                            <img src="images/contact/1.jpg" alt="banner-contact" class="img-reponsive">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-infor">
                            <div class="wrap-right">
                                <div class="img-left">
                                    <img src="images/icon/7.png" alt="">
                                </div>
                                <div class="content-contact">
                                    <h5>ADDRESS</h5>
                                    <p><span>France:</span> Contrada Isola 14, Macerata, 62100 France</p>
                                    <p><span>Filand:</span> Via Cavour, 14 30026 Portogruaro Filand</p>
                                    <p><span>Viet Nam:</span> 76 Le Lai Street, District 1, Ho Chi Minh City,
                                        Vietnam
                                    </p>
                                </div>
                            </div>
                            <div class="wrap-right">
                                <div class="img-left">
                                    <img src="images/icon/8.png" alt="">
                                </div>
                                <div class="content-contact">
                                    <h5>E-MAIL</h5>
                                    <p><span>France:</span>info.fr@plant.com</p>
                                    <p><span>Filand:</span> info.fr@plant.com</p>
                                    <p><span>Viet Nam:</span>info.fr@plant.com</p>
                                </div>
                            </div>
                            <div class="wrap-right">
                                <div class="img-left">
                                    <img src="images/icon/9.png" alt="" class="img-reponsive">
                                </div>
                                <div class="content-contact">
                                    <h5>PHONE</h5>
                                    <p><span>France:</span> +387 64 8459 254 68</p>
                                    <p><span>Filand:</span> +387 64 8459 254 68</p>
                                    <p><span>Viet Nam:</span> +387 64 8459 254 68</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="from-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="check-left ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Your Message</label>
                                <textarea name="textarea" class="form-control" rows="6" required="required"
                                          placeholder=""></textarea>
                            </div>
                            <div class="btn-web ">
                                <a href="#" title="">SEND MESSENGE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wrap-map">
                            <div id="googlemap" class="map"></div>
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