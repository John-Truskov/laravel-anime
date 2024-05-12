@extends('template')
@section('title', 'Админка - Главная')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary">Комментарии</a>
        </div>
        <div class="col-9">
            <h3 class="mb-3">Добро пожаловать в админ панель!</h3>
            <p><b>Количество пользователей всего:</b> {{ $countUsers }}</p>
            <p><b>Количество аниме на сайте всего:</b> {{ $countArticles }}</p>
            <p><b>Количество оставленных комментариев всего:</b> {{ $countComments }}</p>
        </div>
    </div>
@endsection
