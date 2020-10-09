@extends('layouts.main')

{{--META--}}
@section('title', 'Подтверждение заказа')
@section('description', 'Эта страница подтверждающая ваш заказ')
@section('keywords', 'keywords')


@section('content')
    <div class="container">
        <section id="wrapper">
            <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-6 offset-lg-2 col-lg-8">
                <div class="card cart-container">
                    <div class="card-block">
                        <h1 class="h1">Ваш заказ успешно оформлен</h1>
                        <p>Номер вашего заказа: <b>{{ $order_id }}</b></p>
                        <p>Просмотреть статус всех Ваших заказов, можно выбрав в меню
                            "Отследить мой заказ"
                            пункт <a href="#">Отследить мой заказ</a></p>
                        <br>
                        <h2>Благодарим, что выбрали нас!</h2>
                        <h2> Что делать дальше? </h2>
                        <ol>
                            <li> Дождитесь звонка оператора. В течение 15 минут с момента оформления заказа</li>
                            <li> Доставка назначается на следующей с 12:00 до 18:00</li>
                            <li> Оплата производится при получении наличными или банковской картой</li>
                        </ol>
                        <p> Чтобы отменить или изменить заказ, просто позвоните нам по телефону +1 (123) 456-78-90 </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection