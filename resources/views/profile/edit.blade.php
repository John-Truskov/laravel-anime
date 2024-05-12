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
    <hr>
    <form action="/profile" method="post" class="custom-form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <h3>Изменить данные профиля:</h3>
        </div>
        <div class="mb-3">
            <label for="InputName" class="form-label">Имя</label>
            <input name="name" type="text" class="form-control" id="InputName" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">E-mail</label>
            <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" value="{{$user->email}}">
        </div>
        <div class="mb-3">
            <label for="addImage">Изменить аватар</label>
            <input name="avatar" type="file" class="form-control" id="addImage">
        </div>
        <div class="mb-3 col-6">
            <label for="InputPassword" class="form-label">Новый пароль</label>
            <input name="password" type="password" class="form-control" id="InputPassword" value="">
        </div>
        <div class="mb-3 col-6">
            <label for="ConfirmPassword" class="form-label">Повторите новый пароль</label>
            <input name="confirm_password" type="password" class="form-control" id="ConfirmPassword" value="">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
