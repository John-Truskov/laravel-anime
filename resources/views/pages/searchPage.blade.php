@extends('template')
@section('title', 'Результаты поиска')
@section('content')
    <h2>Результаты поиска по запросу: <span class="fs-3 text-primary-emphasis">&#171;{{$search}}&#187;</span></h2>
    @foreach($articles as $article)
        <a href="/blog/{{$article->id}}" class="h2">{{$article->title}}</a>
        <div>{{$article->content}}</div>
        <p><b>Опубликованно:</b> {{$article->date}}</p>
        <hr>
    @endforeach
@endsection
