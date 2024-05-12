@extends('template')
@section('title', 'Редактировать статью')
@section('content')
    <h2 class="text-center">Редактировать статью</h2>
    <div class="col-sm-6 mx-auto my-3">
        <form action="/editArticle" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <img class="rounded mx-auto d-block" style="max-width: 200px; max-height: 200px;" src="{{$article->img}}">
            </div>
            <div class="mb-3">
                <input name="title" type="text" class="form-control" value="{{$article->title}}">
            </div>
            <div class="mb-3">
                <textarea name="contentField" class="form-control">{{$article->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="addImage">Изменить обложку</label>
                <input name="mainImage" type="file" class="form-control" id="addImage">
            </div>
            <div class="mb-3">
                <label for="addFrames">Добавить кадры (можно несколько)</label>
                <input name="frames[]" type="file" class="form-control" id="addFrames" multiple>
            </div>
            <div class="mb-3">
                @if(!empty($article->trailer))
                    <label for="addVideo" class="fw-semibold">Изменить трейлер</label>
                @else
                    <label for="addVideo" class="fw-semibold">Добавить трейлер</label>
                @endif
                <input name="trailer" type="file" class="form-control" id="addVideo">
            </div>
            <div class="mb-3">
                <b>Выберите жанры:</b>
                <div class="border" style="max-height: 200px; max-width: 50%; overflow-y: scroll; padding-left: 1em; padding-top: .5em; margin-top: .5em;">
                @foreach($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}"{{ $genre->checked ?? '' }}>
                        <label for="{{ $genre->id }}" class="form-check-label">{{ $genre->genre }}</label>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="mb-3">
                <span class="fw-semibold">Укажите тип аниме</span>
                <select name="type" class="form-select" aria-label="Укажите тип">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" @selected($type->id == $article->type_id)>{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <span class="fw-semibold">Укажите статус аниме</span>
                <select name="status" class="form-select" aria-label="Укажите статус">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" @selected($status->id == $article->$status)>{{ $status->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Сохранить изменения">
            </div>
            <input type="hidden" name="articleId" value="{{$article->id}}">
        </form>
    </div>
@endsection
