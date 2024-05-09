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
                <input type="submit" class="form-control btn btn-primary" value="Сохранить изменения">
            </div>
            <input type="hidden" name="articleId" value="{{$article->id}}">
        </form>
    </div>
@endsection
