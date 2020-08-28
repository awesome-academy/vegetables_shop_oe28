<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('loginAdmin.title') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('bower_components/bower-package/img/icons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/Font-Awesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/bower-package/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower-package/css/animate.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/bower-package/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/bower-package/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/bower-package/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/bower-package/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower-package/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower-package/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
</head>
<body>

<div class="container-login100 img-container">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form action="{{ route('admin.post_login') }}" class="login100-form validate-form" method="POST">
            @csrf
            <span class="login100-form-title p-b-37">{{ config('loginAdmin.login_admin') }}</span>
            @include('admin.layouts.common.errors')
            @if (session('status'))
                <ul>
                    <li class="text-danger"> {{ session('status') }}</li>
                </ul>
            @endif
            <div class="wrap-input100 validate-input m-b-20">
                <input class="input100" type="email" name="email" placeholder="{{ config('loginAdmin.email') }}">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-25">
                <input class="input100" type="password" name="password" placeholder="{{ config('loginAdmin.password') }}">
                <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    {{ config('loginAdmin.sign_in') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{ mix('js/custom.js') }}"></script>
</body>
</html>
