@extends('template')
@section('title', 'Редактирование пользователя')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary">Комментарии</a>
        </div>
        <div class="col-9">
            <div class="col-sm-6 my-3 mx-auto">
                <h3 class="text-center">Редактирование пользователя</h3>
                <form action="/editUser" method="post" class="custom-form">
                    @csrf
                    <input name="id" type="hidden" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="name" class="fw-semibold">Имя</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="fw-semibold">E-mail</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="fw-semibold">Новый пароль (если нужно)</label>
                        <input name="password" type="test" class="form-control" id="password" placeholder="Пароль">
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold">Выберите роль</span>
                        <select name="role" class="form-select" aria-label="Выберите роль">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @selected($role->id == $userRole)>{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-8 mx-auto">
                        <input type="submit" class="form-control btn btn-primary" value="Редактировать пользователя">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
