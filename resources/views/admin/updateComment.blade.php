@extends('template')
@section('title', 'Редактирование комменария')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Комментарии</a>
        </div>
        <div class="col-9">
            <div class="col-sm-6 my-3 mx-auto">
                <h2 class="text-center mb-3">Редактирование комменария</h2>
                <form action="/editComment" method="post">
                    @csrf
                    <input name="id" type="hidden" value="{{ $comment->id }}">
                    <div class="mb-3">
                        <span class="fw-semibold">Название анимэ</span><br>
                        <a href="/anime/{{ $comment->article_id }}">{{ $comment->article }}</a>
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold">Автор комментария</span><br>
                        <a href="/user/{{ $comment->user_id }}">{{ $comment->user }}</a>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="fw-semibold">Текст комменария</label>
                        <textarea name="comment" class="form-control" id="comment" required>{{ $comment->comment }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" value="Редактировать комменарий">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
