@extends('template')
@section('title', 'Главная страница')
@section('content')
    @foreach($articles as $article)
        <div class="row">
            <div class="col-3">
                <a href="/anime/{{$article->id}}"><img class="img-thumbnail float-end" style="max-width: 200px; max-height: 200px;" src="{{$article->img}}"></a>
            </div>
            <div class="col-9">
                <a href="/anime/{{$article->id}}" class="h2">{{$article->title}}</a>
                <div class="my-3">{{$article->content}}</div>
                <p><b>Опубликованно:</b> {{$article->date}}</p>
            </div>
        </div>
        <hr>
    @endforeach
@endsection
