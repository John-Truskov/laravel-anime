@extends('template')
@section('title', 'Редактировать статью')
@section('content')
    <h2 class="text-center">Редактировать статью</h2>
    <div class="col-sm-6 mx-auto my-3">
        <form action="/editArticle" method="post">
            @csrf
            <div class="mb-3">
                <input name="title" type="text" class="form-control" value="{{$article->title}}">
            </div>
            <div class="mb-3">
                <textarea name="contentField" class="form-control">{{$article->content}}</textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Сохранить изменения">
            </div>
            <input type="hidden" name="articleId" value="{{$article->id}}">
        </form>
    </div>
@endsection
