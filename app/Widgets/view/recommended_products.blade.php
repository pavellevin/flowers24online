<section id="product-related">
    <div class="inner">
        <div class="products">
            <div class="title-heading text-center">
                <h1>{{ __('recommended compositions') }}</h1>
            </div>
            <div class="product-block">
                <div id="pro_related" class="row">
                    @foreach($products as $product)
                        <div class="item-pro">
                            <div class="wrap-box-1">
                                <div class="box-img">
                                    <div class="img" style="height: 100px;width: 100px;">
                                    <a href="{{ route('product', $product->slug) }}">
                                        <img src="{{ $product->getFirstMediaUrl('products', 'admin_thumb') }}"
                                             class="img-responsive" alt="Product"
                                             title="images products">
                                    </a>
                                    </div>
                                    <div class="content-item p-0">
                                        <h5 class="title-h5"><a
                                                    href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                                        </h5>
                                        <div class="bottom">
                                            <div class="text-left pull-left">
                                                @if(!empty($product->old_price))
                                                    <span class="old-price"><del>{{ $product->old_price }} {{ __('messages.uah') }}</del></span>@endif
                                                <span class="price">{{ $product->price }} {{ __('messages.uah') }}</span>
                                            </div>
                                            {{--<div class="text-right">--}}
                                                {{--<span class="height">133 cm</span>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>