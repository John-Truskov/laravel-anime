@extends('template')
@section('title', $article->title)
@section('content')
    <div class="row my-3">
        <div class="col-3">
            <img class="rounded mx-auto" style="max-width: 100%;" src="{{$article->img}}">
        </div>
        <div class="col-9">
            <h2>{{$article->title}}</h2>
            <p><b>Автор:</b> {{$article->user}}  <b>Дата публикации:</b> {{$article->date}}</p>
            <p><b>Жанр: </b>
            @foreach($genres as $genre)
                @if(!next($genres))
                    {{ $genre }}
                @else
                    {{ $genre.', ' }}
                @endif
            @endforeach
            </p>
        </div>
    </div>
    <h3>Описание</h3>
    <div class="mb-3">{{$article->content}}</div>
    @if(count($frames) > 0)
        <h3>Кадры</h3>
        @foreach($frames as $frame)
            <a href="{{$frame->img}}"><img class="img-thumbnail mx-3" style="max-width: 200px; max-height: 200px;" src="{{$frame->img}}"></a>
        @endforeach
    @endif
    @auth
        @if($role == 2)
            <p><a href="/editArticle/{{$article->id}}">[редактировать]</a></p>
        @endif
    <hr>
    <form action="/addComment" method="post">
        @csrf
        <input type="hidden" name="articleId" value="{{$article->id}}">
        <div class="mb-3">
            <textarea name="comment" class="form-control" placeholder="Комментарий"></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="form-control btn btn-primary" value="Добавить комментарий">
        </div>
    </form>
    @endauth
    <hr>
    @if(!empty($comments))
    <h3>Комментарии</h3>
    <div>
        @foreach($comments as $comment)
            <p class="mt-3">
                <span><b>Пользователь:</b> {{$comment->user}}</span>
                <br>
                {{$comment->comment}}
            </p>
        @endforeach
    </div>
    @endif
@endsection
