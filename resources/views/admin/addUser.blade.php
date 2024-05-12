@extends('template')
@section('title', 'Добавление нового пользователя')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary">Комментарии</a>
        </div>
        <div class="col-9">
            <h3 class="text-center">Добавление нового пользователя</h3>
            <div class="col-sm-6 my-3 mx-auto">
                <form action="/addUser" method="post" class="custom-form">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="fw-semibold">Имя</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Имя" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="fw-semibold">E-mail</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="fw-semibold">Пароль</label>
                        <input name="password" type="test" class="form-control" id="password" placeholder="Пароль" required>
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold">Выберите роль</span>
                        <select name="role" class="form-select" aria-label="Выберите роль">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @selected($role->id == 1)>{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-7 mx-auto">
                        <input type="submit" class="form-control btn btn-primary" value="Добавить пользователя">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
