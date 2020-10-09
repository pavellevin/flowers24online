<template>
<div id="cart_top">
    <div class="shopping-cart">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
           aria-haspopup="true" aria-expanded="false">
            <span class="text-cart">{{ __('messages.cart') }}</span>
            <span class="item">({{ $store.state.cartCount }})</span>
        </a>
        <div class="dropdown-menu dropdown-cart">
            <ul v-if="$store.state.cart.length > 0" class="mini-products-list">
                <li v-for="product in $store.state.cart" :key="product.id" class="item-cart">
                    <div class="product-details">
                        <div class="product-img-wrap">
                            <img :src="product.image[0]" alt="" class="img-reponsive">
                        </div>
                        <div class="inner-left">
                            <div class="product-name"><a :href="'/product/' +  product.slug">{{ product.name }} </a>
                            </div>
                            <div class="product-price">
                                 {{ product.totalPrice }} <span>( x{{ product.quantity }}) {{ __('messages.uah') }}</span>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" @click="removeFromCart(product)" class="close"><i class="ion-ios-close-empty"></i></a>
                </li>
            </ul>
            <div class="bottom-cart">
                <div class="cart-price">
                    <strong>{{ __('messages.total') }}: </strong>
                    <span class="price-total">{{ totalPrice }} {{ __('messages.uah') }}</span>
                </div>
                <div class="button-cart">
                    <span class="btn-outline btn-small viewcart">
                        <a href="/shopping-card" title="">{{ __('messages.edit cart') }}</a>
                    </span>
                </div>
                <div class="button-cart mt-25">
                    <span class="btn-outline btn-small checkout">
                        <a href="/checkout" title="">{{ __('messages.checkout') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component CartHeader mounted.');
        },
        computed: {
            totalPrice() {
                let total = 0;
                for (let item of this.$store.state.cart) {
                    total += item.totalPrice;
                }
                return total.toFixed(2);
            }
        },
        methods: {
            removeFromCart(item) {
                this.$store.commit('removeFromCart', item);
            }
        }
    }
</script>
