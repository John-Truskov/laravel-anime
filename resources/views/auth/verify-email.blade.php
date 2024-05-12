@extends('template')
@section('title', 'Подтверждение электронной почты')
@section('content')
    <div class="col-sm-6 my-3 mx-auto">
        <h2 class="text-center">Подтверждение электронной почты</h2>
        <div class="mb-3">
            <p>Спасибо за регистрацию! Прежде чем начать, не могли бы вы подтвердить свой адрес электронной почты, нажав на ссылку, которую мы только что отправили вам по электронной почте? Если вы не получили письмо, мы с радостью отправим вам другое.</p>
        </div>
        @if (session('status') == 'verification-link-sent')
            <div class="mb-3">
                <p>Новая ссылка для подтверждения была отправлена на адрес электронной почты, который вы указали при регистрации.</p>
            </div>
        @endif
        <div class="mb-3">
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <input type="submit" class="form-control btn btn-primary" value="Выслать повторно письмо для подтверждения">
            </form>
        </div>
    </div>
@endsection
