@extends('template')
@section('title', 'Регистрация')
@section('content')
        <div class="col-sm-6 my-3 mx-auto">
            <h2 class="text-center">Регистрация</h2>
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Имя" required>
                </div>
                <div class="mb-3">
                    <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Пароль" required>
                </div>
                <div class="mb-3">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Повторите пароль" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" value="Зарегистриваться">
                </div>
            </form>
        </div>
@endsection
