<div class="widget widget-products">
    <div class="title-heading">
        <span>{{ __('messages.new compositions') }}</span>
    </div>
    <div class="widget-content">
        @foreach($products as $product)
            <div class="product-sidebar">
                <div class="image">
                    <a href="{{ route('product', $product->slug) }}" title="{{ $product->name }}"><img src="{{ $product->getFirstMediaUrl('products', 'admin_thumb') }}" alt="pro01"></a>
                </div>
                <div class="content-product">
                    <div class="product-name">
                        <a href="{{ route('product', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                    </div>
                    <div class="text-left">
                        {{--@if(!empty($product->old_price))--}}
                        {{--<span class="old-price"><del>{{ $product->old_price }} {{ __('messages.uah') }}</del></span>@endif--}}
                        <span class="old-price
                                                        @if(empty($product->old_price)) invisible
                                                    @endif"><del>{{ $product->old_price }} {{ __('messages.uah') }}</del></span>
                    </div>
                    <div class="text-center">
                        <span class="price">{{ $product->price }} {{ __('messages.uah') }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>