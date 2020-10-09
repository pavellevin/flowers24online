@extends('layouts.main')
{{--META--}}
@section('title', 'Новости')
@section('description', 'Наши новости! Следите за нами')
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
                    {{ Breadcrumbs::render('new', $new) }}
                </div>
            </div>
        </section>
    @endsection

    {{--CONTENT--}}
    @section('content')
        <section class="banner-blog banner-blog-details">
        </section>
        <section class="blog-details">
            <div class="cvt-breadcrumbs">
                <div class="container">
                    <div class="wrap-top clearfix">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
                            <div class="color-content">
                                <h2>{{ $new->name }}</h2>
                                <div class="date">
                                    <p> Дата : <span>{{ $new->created_at }}</span>
                                    </p>
                                </div>
                                <div class="title-h5">
                                    <h5>{{ $new->text }}</h5>
                                </div>
                                <p>{{ $new->text }} </p>
                                <p>{{ $new->text }}</p>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="text-center">
                                <div class="share ">
                                    share <i class="Share ion-android-share-alt"></i>
                                </div>
                            </div>
                            <div class="social text-center">
                                <a href="#" title="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" title="instagram">
                                    <i class="    fa fa-instagram"></i>
                                </a>
                                <a href="#" title="Pinterest">
                                    <i class="fa fa-pinterest-p"></i>

                                </a>
                                <a href="#" title="twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
                        <div class="color-content">
                            <img src="{{ $new->getFirstMediaUrl('news', 'new') }}" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding ">
                        <div class="sibar-left text-center">
                            <div class="img-icon">
                                <img src="/images/icon/28_BlogDetails.png" alt="">
                            </div>
                            Any sufficiently advanced technology is indistinguishable from magic.
                            <div class="img-icon">
                                <img src="/images/icon/29_BlogDetails.png" alt="">
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-xs-8 col-sm-8 col-md-8 col-lg-4 no-padding">--}}
                    {{--<div class="color-content">--}}
                    {{--<img src="{{ $new->getFirstMediaUrl('news', 'right') }}" alt="" class="img-responsive">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
                        <div class="color-content">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. There are many variations of passages
                                of
                                Lorem Ipsum available, </p>
                            <p>but the majority have suffered alteration in some form, by injected humour, or
                                randomised
                                words which don't look even slightly believable...Sed ut perspiciatis unde omnis
                                iste
                                natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                eaque
                                ipsa quae ab illo inventore veritatis et quasi architectobeatae vitae dicta sunt
                                explicabo. Nemo enim ipsam voluptatem quia voluptas sit Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                magna
                                aliqua.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et
                                quasi architecto beatae vitae dicta sunt explicabo. There are many variations of
                                passages of Lorem Ipsum available, </p>
                            <p>but the majority have suffered alteration in some form, by injected humour, or
                                randomised
                                words whidon't look even slightly believable...Sed ut perspiciatis unde omnis iste
                                natus
                                error sit voluptatem loremque laudatium, totam rem aperiam, eaque ipsa quae ab illo
                                inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                ipsam voluptatem quia voluptas sit Lorem ipsum dolor sit amet, consectetur
                                adipiscing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        {{--<div class="warp-comment">--}}
                        {{--<div class="comment-top">--}}
                        {{--<div class="entry-between">--}}
                        {{--<span class="label">03 Bình luận</span>--}}
                        {{--<span class="comment">3</span>--}}
                        {{--</div>--}}
                        {{--<div class="comment-text">--}}
                        {{--<div class="img-comment">--}}
                        {{--<img src="images/user/1.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<form>--}}
                        {{--<input type="text" name="comment" class="form-control"--}}
                        {{--placeholder="Leave a message...">--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- OUR-GALLERY-->--}}
                        {{--<div class="gallery-our process clearfix ">--}}
                        {{--<div class="gallery ">--}}
                        {{--<ul class="nav nav-tabs  clearfix">--}}
                        {{--<li class="active"><a data-toggle="tab" href="#menu1">Best <span--}}
                        {{--class="caret"></span></a></li>--}}
                        {{--<li><a data-toggle="tab" href="#menu2">Community</a></li>--}}
                        {{--<li class="warp-right text-right">--}}
                        {{--<div class="share">--}}
                        {{--Share <i class="fa fa-share-square-o" aria-hidden="true"></i>--}}
                        {{--</div>--}}
                        {{--<ul class="setting">--}}
                        {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i--}}
                        {{--class="fa fa-cog" aria-hidden="true"></i><b--}}
                        {{--class="caret"></b></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">Action</a></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<br/>--}}
                        {{--<div class="tab-content">--}}
                        {{--<div id="menu1" class="tab-pane fade in active">--}}
                        {{--<div class="item ">--}}
                        {{--<div class="img-item">--}}
                        {{--<img src="images/user/1.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="content-comment">--}}
                        {{--<div class="wrp-name">--}}
                        {{--<span class="name">Shival ( K )</span> <span class="date">5 hours ago</span>--}}
                        {{--</div>--}}
                        {{--<p>I loving this peer multi shop - so easy to edit to see what--}}
                        {{--my--}}
                        {{--design looks like before I inst</p>--}}
                        {{--<div class="share-comment">--}}
                        {{--<span><i class="fa fa-angle-up"--}}
                        {{--aria-hidden="true"></i></span>--}}
                        {{--<span>|</span>--}}
                        {{--<span><i class="fa fa-angle-down"--}}
                        {{--aria-hidden="true"></i></span>--}}
                        {{--<span>Reply</span>--}}
                        {{--<span> Share <i class="fa fa-angle-right"--}}
                        {{--aria-hidden="true"></i></span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div id="menu2" class="tab-pane fade ">--}}
                        {{--<div class="item ">--}}
                        {{--<div class="img-item">--}}
                        {{--<img src="images/user/1.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="content-comment">--}}
                        {{--<div class="wrp-name">--}}
                        {{--<span class="name">Shival ( K )</span> <span class="date">5 giờ trước</span>--}}
                        {{--</div>--}}
                        {{--<p>I loving this peer multi shop - so easy to edit to see what--}}
                        {{--my--}}
                        {{--design looks like before I inst</p>--}}
                        {{--<div class="share-comment">--}}
                        {{--<span><i class="fa fa-angle-up"--}}
                        {{--aria-hidden="true"></i></span>--}}
                        {{--<span>|</span>--}}
                        {{--<span><i class="fa fa-angle-down"--}}
                        {{--aria-hidden="true"></i></span>--}}
                        {{--<span>Trả lời</span>--}}
                        {{--<span> Share <i class="fa fa-angle-right"--}}
                        {{--aria-hidden="true"></i></span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /gallery -->--}}
                        {{--</div>--}}
                        {{--<!-- END / OUR GALLERY -->--}}
                        {{--<div class="follow clearfix">--}}
                        {{--<div class="left pull-left">--}}
                        {{--<span><i class="fa fa-wifi" aria-hidden="true"></i> Comment feed</span>--}}
                        {{--<span><i class="fa fa-envelope-o"--}}
                        {{--aria-hidden="true"></i> Subscribe via email</span>--}}
                        {{--</div>--}}
                        {{--<div class="right pull-right">--}}
                        {{--<img src="images/icon/DISQUS-LOGO.png" alt="">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </section>
@endsection

{{--FOOTER--}}
@section('footer')
    @include('shared.site.footer_page')
@endsection