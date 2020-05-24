@extends('layouts.app')
@section('content')

    {{ Breadcrumbs::render('login.form') }}

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Авторизация</h4>
                <br>

                <form method="post" action="{{ route('authenticate') }}">
                    @csrf
                    <input type="hidden" name="previous_url" value="{{ $previous_url }}">
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
                        <input name="password" required class="form-control" placeholder="Введите пароль" type="password">
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Войти  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Не зарегистрировались ? <a href="{{ route('register.form') }}">Регистрация</a> </p>
                </form>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->
@stop
