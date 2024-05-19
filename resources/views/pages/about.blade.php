@extends('template')
@section('title', 'О проекте')
@section('footer_script', 'pay')
@section('content')
    <h3 class="section-title mb-4">О проекте</h3>
    <p class="mb-4">Сайт - новинки Аниме (сериалы, мультфильмы и не только)<br>
        О самых свежих новинках Аниме можно познакомится у нас на сайте.<br>
        Описание, трейлеры и многое другое.<br>
        Оставляйте свои комментарии, делитесь впечатлением, задавайте вопросы)<br>
        Добро пожаловать! Присоединяйтесь к нашей команде - любителей Аниме!</p>
    <h3 class="section-title mb-4">Поддержать проект</h3>
    <p>Теперь на сайте появилась форма оплаты, а у вас появилась замечательная возможность поддержать мой проект.</p>
    <form class="form" method="POST" action="https://yoomoney.ru/quickpay/confirm.xml" onsubmit="return pay(this);">
        @csrf
        <fieldset style="border: 1px solid black; border-radius: 10px; padding: 1em; width: 30%; margin: 0 auto;">
            <legend><h3>Оплата</h3></legend>
            <p><label for="sum">Сумма оплаты (руб.):</label></p>
            <input type="text"  class="form-control" name="sum" id="sum" autocomplete="off" autocapitalize="none" required autofocus>
            <div id="error" class="text-danger"></div>
            <p class="form-check my-3"><label class="form-check-label  me-lg-5 me-3"><input type="radio" class="form-check-input" name="paymentType" id="ac" value="AC">Банковской картой</label>
                <label class="form-check-label"><input type="radio" class="form-check-input" name="paymentType" id="pc" value="PC">ЮMoney</label></p>
            <input type="hidden" name="receiver" value="4100118104478246">
            <input type="hidden" name="label" value="Truskov.ru">
            <input type="hidden" name="quickpay-form" value="button">
            <button type="submit" class="form-control btn btn-primary">Оплатить</button>
        </fieldset>
    </form>
@endsection
