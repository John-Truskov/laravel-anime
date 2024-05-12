@extends('template')
@section('title', 'Добавить статью')
@section('content')
    <div class="row">
        <div class="col-3 list-group">
            <a href="/admin" class="list-group-item list-group-item-action list-group-item-primary">Главная</a>
            <a href="/admin/anime" class="list-group-item list-group-item-action list-group-item-primary active" aria-current="true">Аниме</a>
            <a href="/admin/users" class="list-group-item list-group-item-action list-group-item-primary">Пользователи</a>
            <a href="/admin/comments" class="list-group-item list-group-item-action list-group-item-primary">Комментарии</a>
        </div>
        <div class="col-9">
            <h3 class="text-center">Добавить статью</h3>
            <div class="col-sm-9 mx-auto my-3">
                <form action="/addArticle" method="post" class="custom-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="fw-semibold">Заголовок</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Заголовок" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="fw-semibold">Содержимое статьи</label>
                        <textarea name="contentField" class="form-control" placeholder="Контент" id="content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="addImage" class="fw-semibold">Добавить обложку</label>
                        <input name="mainImage" type="file" class="form-control" id="addImage" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFrames" class="fw-semibold">Добавить кадры (можно несколько)</label>
                        <input name="frames[]" type="file" class="form-control" id="addFrames" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="addVideo" class="fw-semibold">Добавить трейлер</label>
                        <input name="trailer" type="file" class="form-control" id="addVideo">
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold">Выберите жанры:</span>
                        <div class="border" style="max-height: 200px; max-width: 50%; overflow-y: scroll; padding-left: 1em; padding-top: .5em; margin-top: .5em;">
                    @foreach($genres as $genre)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}">
                            <label for="{{ $genre->id }}" class="form-check-label">{{ $genre->genre }}</label>
                        </div>
                    @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold">Укажите тип аниме</span>
                        <select name="type" class="form-select" aria-label="Укажите тип">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @selected($type->id == 1)>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <span class="fw-semibold">Укажите статус аниме</span>
                        <select name="status" class="form-select" aria-label="Укажите статус">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" @selected($status->id == 1)>{{ $status->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-4 mx-auto">
                        <input type="submit" class="form-control btn btn-primary" value="Добавить статью">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
