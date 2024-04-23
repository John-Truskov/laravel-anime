@extends('template')
@section('title', 'Главная страница')
@section('content')
    @foreach($articles as $article)
        <a href="/blog/{{$article->id}}" class="h2">{{$article->title}}</a>
        <div>{{$article->content}}</div>
        <p>{{$article->created_at}}</p>
        <hr>
    @endforeach
@endsection
