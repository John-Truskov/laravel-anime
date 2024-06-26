@extends('template')
@section('title', 'Авторизация')
@section('content')
    <div class="col-sm-6 my-3 mx-auto">
        <h2 class="text-center">Авторизация</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="post" class="custom-form">
            @csrf
            <div class="row justify-content-around mb-3">
                <div class="col-6">
                    Нет аккаунта? <a href="/register">Зарегистрироваться</a>
                </div>
                <div class="col-6">
                    Забыли пароль? <a href="{{ route('password.request') }}">Восстановить</a>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" placeholder="E-mail" required autofocus>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" placeholder="Пароль" required>
                <label for="floatingInput">Пароль</label>
            </div>
            <div class="mb-3">
                <input id="remember_me" name="remember" type="checkbox" class="form-check-input">
                <label for="remember_me" class="form-check-label">Запомнить меня</label>
            </div>
            <div class="col-3 mb-3 mx-auto">
                <input type="submit" class="form-control btn btn-primary" value="Войти">
            </div>
        </form>
    </div>
@endsection
