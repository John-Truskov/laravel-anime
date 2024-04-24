@extends('template')
@section('title', 'Авторизация')
@section('content')
    <div class="col-sm-6 my-3 mx-auto">
        <h2 class="text-center">Авторизация</h2>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Пароль" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Войти">
            </div>
        </form>
    </div>
@endsection
