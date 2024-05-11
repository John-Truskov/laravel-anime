@extends('template')
@section('title', 'Добавить статью')
@section('content')
    <h2 class="text-center">Добавить статью</h2>
    <div class="col-sm-6 mx-auto my-3">
        <form action="/addArticle" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input name="title" type="text" class="form-control" placeholder="Заголовок" required>
            </div>
            <div class="mb-3">
                <textarea name="contentField" class="form-control" placeholder="Контент" required></textarea>
            </div>
            <div class="mb-3">
                <label for="addImage">Добавить обложку</label>
                <input name="mainImage" type="file" class="form-control" id="addImage" required>
            </div>
            <div class="mb-3">
                <label for="addFrames">Добавить кадры (можно несколько)</label>
                <input name="frames[]" type="file" class="form-control" id="addFrames" multiple>
            </div>
            <div class="mb-3">
                <b>Выберите жанры:</b>
                @foreach($genres as $genre)
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}">
                    <label for="{{ $genre->id }}" class="form-check-label">{{ $genre->genre }}</label>
                </div>
                @endforeach
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Добавить статью">
            </div>
        </form>
    </div>
@endsection
