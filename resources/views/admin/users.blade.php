@extends('template')
@section('title', 'Админка - Пользователи')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary">Комментарии</a>
        </div>
        <div class="col-9">
            <h2 class="mb-3">Управление пользователями</h2>
            <button class="btn btn-success mb-3" onclick="window.location.href = `/addUser`;">Добавить пользователя</button>
            <div class="row fw-bold text-decoration-underline">
                <div class="col-1">ID</div>
                <div class="col-2">Имя</div>
                <div class="col-3">E-mail</div>
                <div class="col-2">Роль</div>
                <div class="col-2">Редакт.</div>
                <div class="col-2">Удалить</div>
            </div>
            <hr>
            @foreach($users as $user)
                <div class="row">
                    <div class="col-1">{{ $user->id }}</div>
                    <div class="col-2"><a href="/user/{{ $user->id }}" class="link-dark">{{ $user->name }}</a></div>
                    <div class="col-3">{{ $user->email }}</div>
                    @if($user->role_id == 1)
                        <div class="col-2 text-success-emphasis">{{ $user->role }}</div>
                    @elseif($user->role_id == 2)
                        <div class="col-2 text-danger-emphasis">{{ $user->role }}</div>
                    @else
                        <div class="col-2 text-warning-emphasis">{{ $user->role }}</div>
                    @endif
                    <div class="col-2"><a href="/editUser/{{ $user->id }}" class="link-warning">Редакт.</a></div>
                    <div class="col-2"><a href="/deleteUser/{{ $user->id }}" class="link-danger">Удалить</a></div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
