@extends('layouts.app')
@section('content')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .panel-danger.panel-dark.panel-body-colorful, .panel-danger.panel-dark.panel-body-colorful .list-group-item, .panel-danger.panel-dark.panel-body-colorful .panel-body {
            background: #e66454;
            color: #fff;
        }
        .ctr-my-login .panel {
            max-width: 454px;
            min-width: 260px;
            width: 100%;
            margin: 0 auto;
            padding: 20px 15px;
        }
        .panel-danger.panel-dark {
            border-color: #e66454!important;
        }
        .panel, .panel-default {
            border-color: #e4e4e4;
            margin-bottom: 22px;
            position: relative;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .panel {
            margin-bottom: 18px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 2px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-danger.panel-dark .panel-heading {
            background: #e66454;
            border-color: #e66454;
            color: #fff;
        }
        .panel-danger .panel-heading {
            background: #f2dede;
            border-color: #ebccd1;
            color: #b94a48;
            background-size: 20px 20px;
        }
        .panel-danger>.panel-heading {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .panel-heading {
            background: #fafafa;
            border-bottom: 2px solid #ececec;
            padding-bottom: 9px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 11px;
            position: relative;
        }
        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 1px;
            border-top-left-radius: 1px;
        }

        .panel-danger.panel-dark.panel-body-colorful, .panel-danger.panel-dark.panel-body-colorful .list-group-item, .panel-danger.panel-dark.panel-body-colorful .panel-body {
            background: #e66454;
            color: #fff;
        }
        .with-bg-icon {
            position: relative;
            overflow: hidden;
        }
        .panel-body {
            background: #fff;
            margin: 0;
            padding: 20px;
        }
        .panel-heading {
            background: #fafafa;
            border-bottom: 2px solid #ececec;
            padding-bottom: 9px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 11px;
            position: relative;
        }

    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <div class="ctr-my-login">
                    <div class="panel panel-danger panel-dark panel-body-colorful text-center">
                        <div class="panel-heading">
                            <h3 class="no-margin-top">Email не найден</h3>
                        </div>
                        <div class="panel-body with-bg-icon">
                            <div class="no-padding">
                                Личный Кабинет с указанный адресом у&nbsp;нас не&nbsp;зарегистрирован.
                                <br>
                                <br>
                                <a href="{{ route('restore.password') }}" class="btn btn-success">Ввести другой адрес</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->
@stop
