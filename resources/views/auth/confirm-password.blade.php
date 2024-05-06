@extends('template')
@section('title', 'Подтверждение пароля')
@section('content')
    <div class="col-sm-6 my-3 mx-auto">
        <h2 class="text-center">Подтверждение пароля</h2>
        @if($errors->has('password'))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('password') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.confirm') }}" method="post">
            @csrf
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Пароль" required autofocus>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Подтвердить">
            </div>
        </form>
    </div>
@endsection
