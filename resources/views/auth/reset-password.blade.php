@extends('template')
@section('title', 'Установка нового пароля')
@section('content')
    <div class="col-sm-6 my-3 mx-auto">
        <h2 class="text-center">Установка нового пароля</h2>
        @if($errors->has('password_confirmation'))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('password_confirmation') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="E-mail" required autofocus value="{{$request->email ?? null}}">
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Новый пароль" required>
            </div>
            <div class="mb-3">
                <input name="password_confirmation" type="password" class="form-control" placeholder="Подтверждение пароля" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Установить новый пароль">
            </div>
        </form>
    </div>
@endsection
