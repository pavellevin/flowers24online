<template>
        <section id="main-content">
            <div class="container">
                <div class="inner row">
                    <div class="content-left col-md-8 col-sm-8">
                        <div class="title-heading">
                            <h1>{{ __('messages.cart') }}</h1>
                        </div>
                        <div v-for="product in $store.state.cart" class="content-product-list">
                            <div class="product-block">
                                <div class="product-image">
                                    <div class="image">
                                        <img :src="product.image[0]" alt="" class="img-reponsive">
                                    </div>
                                    <div class="product-name">
                                        <span>{{ product.name }}</span>
                                        <div class="quantity">
                                            <div @click="deductFromCart(product)" class="minuss btn"><i class="ion-android-remove"></i></div>
                                            <input type="number" :value="product.quantity" min="1" max="100"/>
                                            <div @click="addToCart(product)" class="pluss btn"><i class="ion-android-add"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <a href="#" @click="removeFromCart(product)"><i class="pe-7s-close"></i></a>
                                    <div class="price">{{ product.price }} {{ __('messages.uah') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="action-cart-page">
                            <div class="continue-shopping btn-outline btn-lage"><a href="/">{{ __('messages.continue shopping') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="content-right col-md-4 col-sm-4">
                        <div class="widget widget-cart-totals">
                            <div class="title-heading">
                                <span>{{ __('messages.cart totals') }}</span>
                            </div>
                            <div class="form-cart-totals">
                                <div class="content-top">
                                    <div class="title">{{ __('messages.total') }}:</div>
                                    <span class="price">{{ totalPrice }} {{ __('messages.uah') }}</span>
                                </div>
                            </div>
                            <div class="proceed-checkout btn-theme btn-lage"><a href="/checkout">{{ __('messages.checkout') }}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
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
            },
            addToCart(item) {
                this.$store.commit('addToCart', item);
            },
            deductFromCart(item) {
                this.$store.commit('deductFromCart', item);
            }
        }
    }
</script>
