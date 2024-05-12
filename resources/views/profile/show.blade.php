@extends('template')
@section('title', 'Профиль')
@section('content')
    <div class="row">
        <div class="col-4">
            <img class="img-fluid" src="{{$user->img ?? '/assets/no-avatar.webp'}}">
        </div>
        <div class="col-6">
            <h3 class="mb-3">Данные профиля:</h3>
            <p><strong>ID: </strong><span>{{$user->id}}</span></p>
            <p><strong>Имя: </strong><span>{{$user->name}}</span></p>
            <p><strong>Email: </strong><span>{{$user->email}}</span></p>
            <p><strong>Статус: </strong><span>{{$role}}</span></p>
        </div>
    </div>
@endsection
