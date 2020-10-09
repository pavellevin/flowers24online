<template>
<div class="inner row">
    <div class="content-left col-md-8 col-sm-12">
        <div class="form-billing-details row">
            <div class="col-md-5 pt-25 pb-10">
                <div class="title-heading">
                    <h3>{{ __('messages.сustomer') }}</h3>
                </div>
                <label>{{ __('messages.name') }} *</label>
                <input type="text" name="name" id="name" :value="login_user.user.name">
                <input type="hidden" name="user_id" id="user_id" :value="login_user.user.id">

                <label>{{ __('messages.phone') }} *</label>
                <input type="text" name="phone" id="phone" :value="login_user.user.phone">
                   <br/>

                <input type="checkbox" name="want_call" id="want_call" class="reset_input_style" @change="viewCall()">
                <span>{{ __('messages.call') }}
                   <i>({{ __('messages.call price') }})</i></span>
                   <br/>

                <input type="checkbox" name="reminder" id="reminder" class="reset_input_style">
                <span>{{ __('messages.remind') }}
                   <i>({{ __('messages.free') }})</i></span>
                   <br/>

                <input type="checkbox" name="want_foto" id="want_foto" class="reset_input_style" @change="viewFoto()">
                 <span>{{ __('messages.photo') }}
                   <i>({{ __('messages.photo price') }})</i></span>
                   <br/>

                <input type="radio" name="want_postcard" id="want_card" class="reset_input_style" value="card" @change="viewPostcardText()">
                 <span>{{ __('messages.postcard') }}
                   <i>({{ __('messages.free') }})</i></span>
                   <br/>

                <input type="radio" name="want_postcard" id="want_postcard" class="reset_input_style" value="postcard" @change="viewPostcardText()">
                 <span>{{ __('messages.branded card') }}
                   <i>({{ __('messages.branded card price') }})</i></span>
                   <textarea name="postcard_text" id="postcard_text"></textarea>
                   <br/>

                   <label>{{ __('messages.comment') }}</label>
                   <textarea name="order note" id="comment"></textarea>
            </div>
            <div class="col-md-5 col-md-offset-1 pt-25 pb-10">
                <div class="title-heading">
                    <h3>{{ __('messages.recipient') }}</h3>
                </div>
                <label>{{ __('messages.name') }} *</label>
                <input type="text" name="recipient_name" id="recipient_name">

                <label>{{ __('messages.phone') }} </label>
                <input type="text" name="recipient_phone" id="recipient_phone">

                <label>{{ __('messages.city town of delivery') }} *</label>
                <select v-model="city_selected" name="city" @change="selectCity()">
                <option value="" disabled selected style='display:none;'>{{ __('messages.select city') }}</option>
                  <option v-for="city in cities" :value="city.id">
                    {{ city.name }}
                  </option>
                </select>

                <label>{{ __('messages.delivery area') }} *</label>
                   <select v-model="districts_selected">
                     <option value="" disabled selected style='display:none;'>
                     <p v-if="loading">{{ __('messages.select city first') }}</p>
                     <p v-else>{{ __('messages.select the area') }}</p>
                     </option>
                     <option v-for="option in options" v-bind:value="option.id">
                       {{ option.name }}
                     </option>
                   </select>

                <label>{{ __('messages.delivery address') }} *</label>
                <input type="text" name="adress" id="adress">

                <label>{{ __('messages.delivery date') }}  *</label>
                <input type="date" name="date_delivery" id="date_delivery">

                <label>{{ __('messages.delivery time') }}  </label>
                <div>{{ __('messages.nearest delivery time') }} :   {{ nearestperiod }}</div>
                <select v-model="period_delivery_selected" @change="viewEarlyLateDelivery()">
                <option value="" disabled selected style='display:none;'>{{ __('messages.сhoose time') }}</option>
                  <option v-for="period in periods" :value="period.id">
                    {{ period.name }}
                  </option>
                </select>

                <br/>
                <input type="checkbox" id="want_time" name="want_time" class="reset_input_style" @change="viewTimeDelivery()">
                <span>{{ __('messages.exact time') }}
                <i>({{ __('messages.exact time price') }})</i></span>
                <input type="time" id="time_delivery" name="time_delivery" class="time_delivery">
            </div>
        </div>
    </div>
    <div class="content-right col-md-4 col-sm-12 pt-25">
        <div class="widget widget-your-order">
            <div class="title-heading">
                <h3>{{ __('messages.your order') }}</h3>
            </div>
            <div v-for="product in $store.state.cart" class="product-sidebar">
                <div class="products">
                    <div class="product-img-wrap">
                        <img :src="product.image[0]" alt="" class="img-reponsive">
                    </div>
                    <div class="inner-left">
                        <div class="product-name">
                            <a :href="'/product/' +  product.slug">{{ product.name }}</a>
                        </div>
                        <div class="product-qty">
                            <span>x {{ product.quantity }}</span>
                        </div>
                        <div class="product-price">
                            <span>{{ product.price }} {{ __('messages.uah') }}</span>
                        </div>
                    </div>
                    <div class="inner-right">
                        <a href="javascript:;" @click="removeFromCart(product)" class="close"><i class="ion-ios-close-empty"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget widget-cart-totals">
            <div class="form-cart-totals">
                <div class="content-top">
                    <div class="title">{{ __('messages.flowers') }}</div>
                    <span class="price">{{ totalPrice }}</span>
                </div>
                <div class="content-center early_late_delivery" style="display:none">
                    <div class="title">{{ __('messages.service morning evening delivery') }}</div>
                    <span class="price" id="early_late_delivery">99.00</span>
                </div>
                <div class="content-center time_delivery" style="display:none">
                    <div class="title">{{ __('messages.service exact time') }}</div>
                    <span class="price" id="exact_time">99.00</span>
                </div>
                <div class="content-center foto" style="display:none">
                    <div class="title">{{ __('messages.service photo') }}</div>
                    <span class="price" id="foto_coast">30.00</span>
                </div>
                <div class="content-center postcard" style="display:none">
                    <div class="title">{{ __('messages.service postcard') }}</div>
                    <span class="price" id="postcard_coast">10.00</span>
                </div>
                <div class="content-center call" style="display:none">
                    <div class="title">{{ __('messages.service pre-call') }}</div>
                    <span class="price" id="call">99.00</span>
                </div>
                <div class="content-center">
                    <div class="title">{{ __('messages.delivery') }}</div>
                    <span class="price" id="coast_delivery">0.00</span>
                </div>
                <div class="content-bottom">
                    <div class="total">{{ __('messages.total') }}</div>
                    <span class="price" id="total_price">{{ totalPrice }}</span>
                </div>
            </div>
        </div>
        <div class="title-heading">
            <h3>{{ __('messages.add to the order') }}</h3>
        </div>
        <div class="dop-class">
            <div v-for="product in dopproducts" class="wrap-box-1">
                <div class="box-img">
                    <div class="img">
                        <a :href="'/product/'+product.slug" tabindex="0">
                        <img :src="product.img" :alt="product.name" :title="product.name" class="img-responsive">
                        </a>
                </div>
                <button @click="addToCart(product)" type="submit" class="btn-login btn-theme btn-medium btn-buy"><span>{{__('messages.buy')}}</span></button>
            <div class="content-item p-0">
                <h5 class="title-h5">
                    <a :href="/product/+product.slug" tabindex="0">
                        {{product.name}}
                    </a>
                </h5>
                <div class="bottom">
                    <div class="text-left pull-left">
                        <span class="old-price"><del>{{product.old_price}} {{ __('messages.uah') }}</del></span>
                        <span class="price">{{product.price}} {{ __('messages.uah') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <button v-on:click="createOrder()" type="submit" class="btn-login btn-theme btn-medium mb-20 mt-25">
            <span>{{ __('messages.confirm') }}</span>
        </button>
    </div>
</div>
</template>

<script>
    export default {
       data() {
           return {
               city_selected: '',
               districts_selected: '',
               period_delivery_selected: '',
               options: '',
               loading: true,
           }
       },
       props: [
           'cities',
           'login_user',
           'nearestperiod',
           'periods',
           'dopproducts',
        ],
        mounted() {
            let delivery = Number($('#coast_delivery').text());
            let total = Number($('#total_price').text());
            if(total < 500){
                $('#coast_delivery').text('99.00');
                delivery = Number($('#coast_delivery').text());
                let totaldelivery = total + delivery;
                $('#total_price').text(totaldelivery.toFixed(2));
            }
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
            selectCity() {
                const self = this;
                axios.get('/get-districts/'+this.city_selected)
                    .then(function(response) {
                        self.options = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .finally(() => (this.loading = false));
                },
            removeFromCart(item) {
                this.$store.commit('removeFromCart', item);
            },
            addToCart(item) {
                this.$store.commit('addToCart', item);
            },
            deductFromCart(item) {
                this.$store.commit('deductFromCart', item);
            },
            createOrder: function() {
                let data = {
                    cart: JSON.stringify(this.$store.state.cart),
                    order_key: (+new Date).toString(36),
                    user_id: document.getElementById('user_id').value,
                    phone: document.getElementById('phone').value,
                    recipient_name: document.getElementById('recipient_name').value,
                    recipient_phone: document.getElementById('recipient_phone').value,
                    city_id: this.city_selected,
                    district_id: this.districts_selected,
                    adress: document.getElementById('adress').value,
                    period_id: this.period_delivery_selected,
                    date_delivery: document.getElementById('date_delivery').value,
                    comment: document.getElementById('comment').value,
                    reminder: document.getElementById('reminder').checked,
                    want_postcard: $('input[name="want_postcard"]:checked').val(),
                    want_foto: document.getElementById('want_foto').checked,
                    want_call: document.getElementById('want_call').checked,
                    postcard_text: document.getElementById('postcard_text').value,
                    want_time: document.getElementById('want_time').checked,
                    time_delivery: document.getElementById('time_delivery').value,
                };
                console.log(data);
                axios.post('/create-order', data)
                    .then(function(response) {
                    console.log(response);
                        window.localStorage.removeItem("cart");
                        window.localStorage.removeItem("cartCount");
                        window.location.replace("/confirm/" + response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            viewPostcardText() {
                $("#postcard_text").show();
                let postcard = Number($('#postcard_coast').text());
                let total = Number($('#total_price').text());
                if(want_postcard.checked){
                     $(".postcard").show();
                     let totalpostcard = total + postcard;
                     $('#total_price').text(totalpostcard.toFixed(2));
                } else {
                     $(".postcard").hide();
                     let totalpostcard = total - postcard;
                     $('#total_price').text(totalpostcard.toFixed(2));
                }
            },
            viewTimeDelivery(){
                $(".time_delivery").fadeToggle(100);
                $("#period_delivery").fadeToggle(100);
                let exacttime = Number($('#exact_time').text());
                let total = Number($('#total_price').text());
                if(want_time.checked){
                     let totalexacttime = total + exacttime;
                     $('#total_price').text(totalexacttime.toFixed(2));
                } else {
                     let totalexacttime = total - exacttime;
                     $('#total_price').text(totalexacttime.toFixed(2));
                }
            },
            viewFoto(){
                $(".foto").fadeToggle(100);
                let foto_coast = Number($('#foto_coast').text());
                let total = Number($('#total_price').text());
                if(want_foto.checked){
                     let totalfoto = total + foto_coast;
                     $('#total_price').text(totalfoto.toFixed(2));
                } else {
                     let totalfoto = total - foto_coast;
                     $('#total_price').text(totalfoto.toFixed(2));
                }
            },
            viewCall(){
                $(".call").fadeToggle(100);
                let call_coast = Number($('#call').text());
                let total = Number($('#total_price').text());
                if(want_call.checked){
                     let totalfoto = total + call_coast;
                     $('#total_price').text(totalfoto.toFixed(2));
                } else {
                     let totalfoto = total - call_coast;
                     $('#total_price').text(totalfoto.toFixed(2));
                }
            },
            viewEarlyLateDelivery(){
                $(".early_late_delivery").fadeToggle(100);
                let early_late_delivery = Number($('#early_late_delivery').text());
                let total = Number($('#total_price').text());
                if(this.period_delivery_selected == 1 || this.period_delivery_selected == 8){
                     let totalearlylatedelivary = total + early_late_delivery;
                     $('#total_price').text(totalearlylatedelivary.toFixed(2));
                } else {
                     let totalearlylatedelivary = total - early_late_delivery;
                     $('#total_price').text(totalearlylatedelivary.toFixed(2));
                }
            },
        }
    }
</script>
