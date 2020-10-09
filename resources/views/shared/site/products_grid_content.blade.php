<section id="main-content">
    <div class="container-fluid inner">
        <div class="row">
            <div id="category_title" class="col-md-9">
                @isset($catalog)
                <h1 class="category_title">{{ $catalog->name }}</h1>
                @endisset
                @if(sizeof($products))
                @include('shared.site.block_sorting')
                <div class="products product-grid">
                    <div class="product-block">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="item col-lg-3 col-md-6 col-sm-6  col-xs-6 wrap-box">
                                    <div class="wrap-box-1">
                                        <div class="box-img">
                                            <a href="{{ route('product', $product->slug) }}">
                                                <img src="{{ $product->getFirstMediaUrl('products', 'item_img') }}"
                                                     class="img-responsive"
                                                     alt="Product"
                                                     title="images products">
                                            </a>
                                            {{--<div class="content-item">--}}
                                            {{--<h5 class="title-h5"><a href="#">{{ $product->name }}</a></h5>--}}
                                            {{--<div class="bottom">--}}
                                            {{--<div class="text-left pull-left">--}}
                                            {{--<span class="old-price"><del>{{ $product->old_price }}</del></span>--}}
                                            {{--<span class="price">{{ $product->price }}</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="text-right">--}}
                                            {{--<span class="height">133 cm</span>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="btn-product">--}}
                                                <button @click="addToCart({{json_encode($product)}})" type="submit" class="btn-login btn-theme btn-medium btn-buy"><span>{{__('messages.buy')}}</span></button>
                                                {{--<div class="wrap-btn">--}}
                                                    {{--<a href="/"><span><i class="icon-wishlist"></i></span></a>--}}
                                                    {{--<a href="{{ route('product', $product->slug) }}"><span><i--}}
                                                                    {{--class="icon-search"></i></span></a>--}}
                                                    {{--<a href="javascript:;" @click="addToCart({{json_encode($product)}})"--}}
                                                    {{--><span><i class="icon-cart"></i></span></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="pro-list">
                                                <h1 class="pro-name"><a
                                                            href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                                </h1>
                                                <div class="pro-star">
                                                    <div class="star-rating">
                                                        <span class="fa fa-star-o" data-rating="1"></span>
                                                        <span class="fa fa-star-o" data-rating="2"></span>
                                                        <span class="fa fa-star-o" data-rating="3"></span>
                                                        <span class="fa fa-star-o" data-rating="4"></span>
                                                        <span class="fa fa-star-o" data-rating="5"></span>
                                                        <input type="hidden" name="whatever1" class="rating-value"
                                                               value="2.56">
                                                    </div>
                                                </div>
                                                <div class="pro-price">
                                                    <span class="old-price"><del>{{ $product->old_price }} {{ __('messages.uah') }}</del></span>
                                                    <span class="price">{{ $product->price }} {{ __('messages.uah') }}</span>
                                                </div>
                                                <div class="pro-desc">
                                                    <p>
                                                        {{ $product->description }}
                                                    </p>
                                                </div>
                                                <div class="pro-action">
                                                    <span class="btn-theme btn-medium addcart">
                                                        <a href="javascript:;" @click="addToCart({{json_encode($product)}})">В корзину</a>
                                                    </span>
                                                    <span class="btn-action btn-wishlist">
                                                        <a href="#"><i class="pe-7s-like"></i></a>
                                                    </span>
                                                    <span class="btn-action btn-search">
                                                        <a href="{{ route('product', $product->slug) }}"><i class="pe-7s-search"></i></a>
                                                    </span>
                                                </div>
                                                <div class="pro-share">
                                                    <span>Share this :</span>
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        {{--</div>--}}
                                        <div class=" product-block-info">
                                            <h5 class="title-h5"><a href="#">{{ $product->name }}</a></h5>
                                        </div>
                                        <div class="content-item">
                                            <div class="bottom">
                                                <div class="text-left pull-left">
                                                    <span class="old-price"><del>{{ $product->old_price }} {{ __('messages.uah') }}</del></span>
                                                    <span class="price">{{ $product->price }} {{ __('messages.uah') }}</span>
                                                </div>
                                                {{--<div class="text-right">--}}
                                                    {{--<span class="height">133 cm</span>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{ $products->links('shared.site.pagination') }}
                @else
                    <div class="info"><h3>По заданным критериям товара не найдено!</h3></div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="sidebar sidebar-right hidden-xs">
                    @if(isset($catalog) && in_array($catalog->id, ['5','7','8','25','26']))
                        @widget('filter_flower', ['slug' => $catalog->slug, 'filters' => $filters])
                    @endif
                    @if(isset($catalog) && in_array($catalog->id, ['28']))
                        @widget('filter_dop', ['slug' => $catalog->slug, 'filters' => $filters])
                    @endif
                    @widget('filter_price', ['filters' => $filters])
                {{--</div>--}}
                {{--<div class="sidebar sidebar-right">--}}
                    @widget('catalog')
                    {{--<div class="widget widget-filter-brand">--}}
                    {{--<div class="title-heading">--}}
                    {{--<span>BY BRAND</span>--}}
                    {{--</div>--}}
                    {{--<div class="widget-content">--}}
                    {{--<ul>--}}
                    {{--<li><a href="#">Aeccaft</a>(25)</li>--}}
                    {{--<li><a href="#">Artek</a>(70)</li>--}}
                    {{--<li><a href="#">Bower</a>(59)</li>--}}
                    {{--<li><a href="#">Culinarium</a>(35)</li>--}}
                    {{--<li><a href="#">Desu</a>(45)</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    @widget('products')
                </div>
            </div>
        </div>
    </div>
</section>
