@extends('template')
@section('title', 'Админка - Комментарии')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Комментарии</a>
        </div>
        <div class="col-9">
            <h2 class="mb-3">Управление комментариями</h2>
            <div class="row fw-bold text-decoration-underline">
                <div class="col-1">ID</div>
                <div class="col-4">Текст</div>
                <div class="col-3">Автор</div>
                <div class="col-2">Редакт.</div>
                <div class="col-2">Удалить</div>
            </div>
            <hr>
            @foreach($comments as $comment)
                <div class="row">
                    <div class="col-1">{{ $comment->id }}</div>
                    <div class="col-4"><a href="/anime/{{ $comment->article_id }}" class="link-dark">{{ $comment->comment }}</a></div>
                    <div class="col-3">{{ $comment->user }}</div>
                    <div class="col-2"><a href="/editComment/{{ $comment->id }}" class="link-warning">Редакт.</a></div>
                    <div class="col-2"><a href="/deleteComment/{{ $comment->id }}" class="link-danger">Удалить</a></div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
