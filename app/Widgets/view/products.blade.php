<div class="widget widget-products">
    <div class="title-heading">
        <span>НОВЫЕ КОМПОЗИЦИИ</span>
    </div>
    <div class="widget-content">
        @foreach($products as $product)
            <div class="product-sidebar">
                <div class="image">
                    <img src="{{ $product->getFirstMediaUrl('products', 'admin_thumb') }}" alt="pro01">
                </div>
                <div class="content-product">
                    <div class="product-name">
                        <a href="{{ route('product', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                    </div>
                    <div class="product-price">
                        <span class="old-price"><del>${{ $product->old_price }}</del></span>
                        <span class="price">${{ $product->price }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>