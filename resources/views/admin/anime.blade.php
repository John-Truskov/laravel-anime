@extends('template')
@section('title', 'Админка - Аниме')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary">Комментарии</a>
        </div>
        <div class="col-9">
            <h2 class="mb-3">Управление аниме</h2>
            <button class="btn btn-success mb-3" onclick="window.location.href = `/addArticle`;">Добавить аниме</button>
            <div class="row fw-bold text-decoration-underline">
                <div class="col-1">ID</div>
                <div class="col-4">Название</div>
                <div class="col-3">Автор</div>
                <div class="col-2">Редакт.</div>
                <div class="col-2">Удалить</div>
            </div>
            <hr>
            @foreach($articles as $article)
                <div class="row">
                    <div class="col-1">{{ $article->id }}</div>
                    <div class="col-4"><a href="/anime/{{ $article->id }}" class="link-dark">{{ $article->title }}</a></div>
                    <div class="col-3">{{ $article->user }}</div>
                    <div class="col-2"><a href="/editArticle/{{ $article->id }}" class="link-warning">Редакт.</a></div>
                    <div class="col-2"><a href="/deleteArticle/{{ $article->id }}" class="link-danger">Удалить</a></div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
