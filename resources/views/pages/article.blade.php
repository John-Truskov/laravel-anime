@extends('template')
@section('title', $article->title)
@if(!empty($article->trailer))
    @section('style', 'videojs.min')
    @section('video_style', 'videojs.fantasy.skin')
    @section('footer_script', 'video.min')
    @section('video_script', 'ru.min')
@endif
@section('content')
    <div class="row my-3">
        <div class="col-3">
            <img class="rounded mx-auto" style="max-width: 100%;" src="{{$article->img}}">
        </div>
        <div class="col-9">
            <h2>{{$article->title}}</h2>
            <p><b>Автор:</b> {{$article->user}}  <b>Дата публикации:</b> {{$article->date}}</p>
            <p><b>Тип:</b> {{$article->type}}</p>
            <p><b>Статус:</b> {{$article->status_title}}</p>
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
        <div class="mb-3">
            <h3>Кадры</h3>
            @foreach($frames as $frame)
                <a href="{{$frame->img}}"><img class="img-thumbnail mx-3" style="max-width: 200px; max-height: 200px;" src="{{$frame->img}}"></a>
            @endforeach
        </div>
    @endif
    @if(!empty($article->trailer))
        <h3>Трейлер</h3>
        <video preload="metadata" controls width="600" class="video-js vjs-theme-fantasy" id="video">
            <source src="{{$article->trailer}}" type="video/mp4">
            <p>Your brouwser doesn&prime;t support HTML5 video.</p>
        </video>
    @endif
    @auth
    <hr>
    <form action="/addComment" method="post">
        @csrf
        <input type="hidden" name="articleId" value="{{$article->id}}">
        <div class="mb-3">
            <h3>Оставить комментарий</h3>
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
            <div class="px-4 mt-3 team-thumb bg-white shadow-lg">
                <b>Пользователь:</b> <a href="/user/{{$comment->user_id}}">{{$comment->user}}</a>
                <p class="mb-0">
                    {{$comment->comment}}
                </p>
            </div>
        @endforeach
    </div>
    @endif
@endsection
