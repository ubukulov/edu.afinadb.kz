@extends('layouts.app')
@section('content')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .ctr-my-login .panel {
            max-width: 454px;
            min-width: 260px;
            width: 100%;
            margin: 0 auto;
            padding: 20px 15px;
        }
        .panel-success.panel-dark {
            border-color: #5ebd5e!important;
        }
        .panel-body {
            background: #5ebd5e;
            color: #fff;
        }
        .with-bg-icon {
            position: relative;
            overflow: hidden;
        }
        .panel-body {
            background: #5ebd5e;
            margin: 0;
            padding: 20px;
        }
        .with-bg-icon .bg-icon-bottom-right {
            position: absolute;
            bottom: -23px;
            width: 100%;
            right: 5px;
            text-align: right;
        }
        .with-bg-icon div {
            position: relative;
        }
        .no-padding {
            padding: 0!important;
        }
        .no-padding {
            padding: 0!important;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Восстановить пароль</h4>
                <br>

                <div class="ctr-my-login">
                    <div class="panel panel-success panel-dark panel-body-colorful text-center" style="background: #5ebd5e;
    color: #fff;">
                        <div class="panel-heading">
                            <h3 class="no-margin-top">Письмо отправлено</h3>
                        </div>
                        <div class="panel-body with-bg-icon">
                            <div class="bg-icon-bottom-right">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="no-padding">
                                Инструкции по восстановлению пароля отправлены на указанный вами адрес электронной почты.
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->
@stop
