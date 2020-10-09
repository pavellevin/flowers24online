<template>
<div class="inner row">
    <div class="content-left col-md-8 col-sm-8">
        <div class="title-heading">
            <span>Детали заказа</span>
        </div>
        <div class="form-billing-details row">
            <div class="col-md-6">
                <label>Имя *</label>
                <input type="text" name="name" id="name" :value="login_user.user.name">
                <input type="hidden" name="user_id" id="user_id" :value="login_user.user.id">
            </div>
            <div class="col-md-6">
                <label>Телефон *</label>
                <input type="text" name="phone" id="phone" :value="login_user.user.phone">
            </div>
            <div class="col-md-6">
                <label>Город доставки *</label>
                <select v-model="city_selected" name="city" @change="selectCity()">
                <option value="" disabled selected style='display:none;'>Выберите город</option>
                  <option v-for="city in cities" :value="city.id">
                    {{ city.name }}
                  </option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Район доставки *</label>
                   <select v-model="districts_selected">
                     <option value="" disabled selected style='display:none;'>
                     <p v-if="loading">Для начала выберите город</p>
                     <p v-else>Теперь можно выбрать район</p>
                     </option>
                     <option v-for="option in options" v-bind:value="option.id">
                       {{ option.name }}
                     </option>
                   </select>
            </div>
            <div class="col-md-6">
                <label>Адрес доставки *</label>
                <input type="text" name="adress" id="adress">
            </div>
            <div class="col-md-3">
                <label>Дата доставки *</label>
                <input type="date" name="date_delivery" id="date_delivery">
            </div>
            <div class="col-md-3" id="period_delivery">
                <label>Время доставки </label>
                <select v-model="period_delivery_selected">
                <option value="" disabled selected style='display:none;'>Выберите</option>
                  <option v-for="period in periods" :value="period.id">
                    {{ period.name }}
                  </option>
                </select>
            </div>
            <div class="col-md-6">
                <div>
                <input type="checkbox" name="reminder" id="reminder" class="reset_input_style">
                <span>Напомнить о событии?</span>
                </div>
                    <br/>
                <input type="checkbox" name="want_postcard" id="want_postcard" class="reset_input_style" @change="viewPostcardText()">
                 <span>Добавить открытку к букету?</span>
                   <br/>
                 <i>(стоимость услуги 10 грн)</i>
                <textarea name="postcard_text" id="postcard_text"
                          placeholder="Укажите текст для открытки"></textarea>
            </div>
            <div class="col-md-6">
                <input type="checkbox" id="want_time" name="want_time" class="reset_input_style" @change="viewTimeDelivery()">
                <span>Хочу указать точное время доставки</span>
                <br/>
                <i>(стоимость услуги 99 грн)</i>
                        <input type="time" id="time_delivery" name="time_delivery" class="time_delivery">
                <div class="title">
                    <span>Комментарии к заказу</span>
                </div>
                <textarea name="order note" id="comment"
                          placeholder="Укажите необходимую информацию к доставке"></textarea>
            </div>
        </div>
    </div>
    <div class="content-right col-md-4 col-sm-4">
        <div class="widget widget-your-order">
            <div class="title-heading">
                <span>Ваш заказ</span>
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
                            <span>₴ {{ product.price }}</span>
                        </div>
                    </div>
                    <div class="inner-right">
                        <a href="javascript:;" @click="removeFromCart(product)" class="close"><i class="ion-ios-close-empty"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget widget-cart-totals">
            <div class="title-heading">
                <span>Cart Totals</span>
            </div>
            <div class="form-cart-totals">
                <div class="content-top">
                    <div class="title">Цветы</div>
                    <span class="price">{{ totalPrice }}</span>
                </div>
                <div class="content-center time_delivery" style="display:none">
                    <div class="title">Услуга "точное время"</div>
                    <span class="price" id="exact_time">99.00</span>
                </div>
                <div class="content-center postcard" style="display:none">
                    <div class="title">Услуга "открытка"</div>
                    <span class="price" id="postcard_coast">10.00</span>
                </div>
                <div class="content-center">
                    <div class="title">Доставка</div>
                    <span class="price" id="coast_delivery">0.00</span>
                </div>
                <div class="content-bottom">
                    <div class="total">Total</div>
                    <span class="price" id="total_price">{{ totalPrice }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <button v-on:click="createOrder()" type="submit" class="btn-login btn-theme btn-medium mt-10">
            <span>Подтвердить</span>
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
           'periods'
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
                    city_id: this.city_selected,
                    district_id: this.districts_selected,
                    adress: document.getElementById('adress').value,
                    period_id: this.period_delivery_selected,
                    date_delivery: document.getElementById('date_delivery').value,
                    comment: document.getElementById('comment').value,
                    reminder: document.getElementById('reminder').checked,
                    want_postcard: document.getElementById('want_postcard').checked,
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
                $(".postcard").fadeToggle(100);
                $("#postcard_text").fadeToggle(100);
                let postcard = Number($('#postcard_coast').text());
                let total = Number($('#total_price').text());
                if(want_postcard.checked){
                     let totalpostcard = total + postcard;
                     $('#total_price').text(totalpostcard.toFixed(2));
                } else {
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
            }
        }
    }
</script>
