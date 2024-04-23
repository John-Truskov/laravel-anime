@extends('template')
@section('title', $article->title)
@section('content')
        <a href="/blog/{{$article->id}}" class="h2">{{$article->title}}</a>
        <div>{{$article->content}}</div>
        <p>{{$article->created_at}}</p>
@endsection
