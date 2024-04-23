@extends('template')
@section('title', 'Добавить статью')
@section('content')
    <h2 class="text-center">Добавить статью</h2>
    <div class="col-sm-6 mx-auto my-3">
        <form action="/addArticle" method="post">
            @csrf
            <div class="mb-3">
                <input name="title" type="text" class="form-control" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="contentField" class="form-control" placeholder="Контент"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Добавить статью">
            </div>
        </form>
    </div>
@endsection
