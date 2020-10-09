<footer class="footer footer-page">
    <div class="footer-top">
        <div class="container">
            <form action="{{ route('mailing') }}" method="post">
                {{ csrf_field() }}
                <div class="inner row">
                    <div class="col-md-4">
                        <h5 class="title-h5">Хочешь знать новости?<br>Подпишись!</h5>
                    </div>
                    <div class="col-md-4 pt-50">
                        <input name="email" placeholder="Enter your e-mail" class="form-control" type="text">
                    </div>
                    <div class="btn-web btn-web-1 col-md-4">
                        {{--<a href="#" title="">Подтвердить</a>--}}
                        <button class="btn-web-2"><span>Подтвердить</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom">
            <div class="wrap-copyright">
                <div class="copyright">
                    Copyright © 218 <a href="" title="">Plant</a>.Powered by
                </div>
                <div class="countries">
                    {{--<img src="images/icon/6.png" alt="">United States--}}
                </div>
            </div>
            {{--<div class="row">--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">--}}
            {{--<div class="menu-footer">--}}
            {{--<ul>--}}
            {{--<li><a href="#">Gift Center</a></li>--}}
            {{--<li><a href="#">FAQ</a></li>--}}
            {{--<li><a href="#">Terms of Use</a></li>--}}
            {{--<li><a href="#">Privacy Policy</a></li>--}}
            {{--<li><a href="#">Buying Guildes</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">--}}
            {{--<div class="social">--}}
            {{--<a href="#" title="facebook">--}}
            {{--<i class="fa fa-facebook"></i>--}}
            {{--</a>--}}
            {{--<a href="#" title="facebook">--}}
            {{--<i class="fa fa-instagram"></i>--}}
            {{--</a>--}}
            {{--<a href="#" title="Pinterest">--}}
            {{--<i class="fa fa-pinterest-p"></i>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</footer>
<!-- Menu offcanvas -->
<div id="pbr-off-canvas" class="pbr-off-canvas sidebar-offcanvas hidden-lg hidden-md">
    <div class="pbr-off-canvas-body">
        <div class="offcanvas-head">
            <button type="button" class="btn btn-close btn-toggle-canvas" data-toggle="offcanvas">
                <i class="pe-7s-close-circle"></i>
            </button>
            <span>Menu</span>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static">
            <ul class="nav navbar-nav">
                <li class="level1 active hassub">
                    <a href="javascript:;">Каталог</a>
                </li>
                <li class="level1 hassub">
                    <a href="/about-us">О нас</a>
                </li>
                <li class="level1 hassub">
                    <a href="/news">Новости</a>
                </li>
                <li class="level1 hassub">
                    <a href="/contacts">Контакты</a>
                </li>
            </ul>
        </nav>
    </div>
</div>