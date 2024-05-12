@extends('template')
@section('title', 'Восстановление пароля')
@section('content')
    <div class="col-sm-6 my-3 mx-auto">
        <h3 class="text-center">Восстановление пароля</h3>
        @if($errors->has('email'))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('email') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="post" class="custom-form">
            @csrf
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="E-mail" required autofocus>
            </div>
            <div class="mb-3 col-5 mx-auto">
                <input type="submit" class="form-control btn btn-primary" value="Восстановить пароль">
            </div>
        </form>
    </div>
@endsection
