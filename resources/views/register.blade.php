@extends('layouts.app')
@section('content')

    {{ Breadcrumbs::render('register.form') }}

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Создать учетный запись</h4>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('registration') }}">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="firstname" value="{{ old('firstname') }}" required class="form-control" placeholder="Ваше имя" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" value="{{ old('email') }}" required class="form-control" placeholder="Введите Email" type="email">
                    </div> <!-- form-group// -->


                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password" value="{{ old('password') }}" required class="form-control" placeholder="Введите пароль" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="confirm_password" value="{{ old('confirm_password') }}" required class="form-control" placeholder="Подтвердите пароль" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Создать профиль  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Вы уже зарегистрированы? <a href="{{ route('login') }}">Войти</a> </p>
                </form>

                <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p>

                <p>
                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
                </p>

            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->
@stop
