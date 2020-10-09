<template>
    <div class="products product-grid">
        <div class="product-block">
            <div class="row">
                    <div v-for="product in products" class="item col-lg-3 col-md-6 col-sm-6 wrap-box">
                        <div  class="wrap-box-1">
                            <div class="box-img">
                                <a :href="'/product/' + product.slug">
                                    <img src="#"
                                         class="img-responsive"
                                         :alt="product.name"
                                         :title="product.name">
                                </a>
                                <div class="btn-product">
                                    <div class="wrap-btn">
                                        <a href="#" @click="addToCart(product)"><span><i class="icon-cart"></i></span></a>
                                        <a href="/"><span><i class="icon-wishlist"></i></span></a>
                                        <a href="#"><span><i
                                                        class="icon-search"></i></span></a>
                                    </div>
                                </div>
                                <div class="pro-list">
                                    <div class="pro-name"><a :href="'/product/' + product.slug">{{ product.name }}</a>
                                    </div>
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
                                        <span class="old-price"><del>{{ product.old_price }} {{ __('messages.uah') }}</del></span>
                                        <span class="price">{ product.price }} {{ __('messages.uah') }}</span>
                                    </div>
                                    <div class="pro-desc">
                                        <p>
                                            {{ product.description }}
                                        </p>
                                    </div>
                                    <div class="pro-action">
                                        <span class="btn-theme btn-medium addcart">
                                            <a href="#">Add to cart</a>
                                        </span>
                                        <span class="btn-action btn-wishlist">
                                            <a href="#"><i class="pe-7s-like"></i></a>
                                        </span>
                                        <span class="btn-action btn-search">
                                            <a href="#"><i class="pe-7s-search"></i></a>
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
                                <h5 class="title-h5"><a :href="'/product/' + product.slug">{{ product.name }}</a></h5>
                            </div>
                            <div class="content-item">
                                <div class="bottom">
                                    <div class="text-left pull-left">
                                        <span class="old-price"><del>{{ product.old_price }} {{ __('messages.uah') }}</del></span>
                                        <span class="price">{{ product.price }} {{ __('messages.uah') }}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="height">133 cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
                'products'
            ],
        mounted() {
            console.log('Component ProductComponent mounted.');
        },
        methods: {
            addToCart(item) {
                // console.log(item);
                // console.log(JSON.stringify(item));
                this.$store.commit('addToCart', item);
            }
        }

    }
</script>
