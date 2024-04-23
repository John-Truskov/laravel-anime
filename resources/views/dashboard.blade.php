@extends('template')
@section('title', 'Профиль')
@section('content')
        <p><strong>ID: </strong><span>{{$user->id}}</span></p>
        <p><strong>Email: </strong><span>{{$user->email}}</span></p>
        <p><strong>Имя: </strong><span>{{$user->name}}</span></p>
@endsection
