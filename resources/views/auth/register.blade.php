@extends('template')
@section('title', 'Регистрация')
@section('content')
        <div class="col-sm-6 my-3 mx-auto">
            <h2 class="text-center">Регистрация</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
                </div>
            @endif
            <form action="/register" method="post" class="custom-form">
                @csrf
                <p>Есть аккаунт? <a href="/login">Войти</a></p>
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Имя" required autofocus>
                    <label for="floatingInput">Имя</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                    <label for="floatingInput">E-mail</label>
                </div>
                <div class="form-floating">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Пароль" required>
                    <label for="floatingInput">Пароль</label>
                    <a href="#" onclick="genPassword(); return false;" style="display: block; position: relative; top: -24px; text-align: right;">Генерировать пароль</a>
                </div>
                <div class="form-floating mb-3">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Повторите пароль" required>
                    <label for="floatingInput">Повторите пароль</label>
                </div>
                <div class="col-5 mb-3 mx-auto">
                    <input type="submit" class="form-control btn btn-primary" value="Зарегистриваться">
                </div>
            </form>
        </div>
@endsection
