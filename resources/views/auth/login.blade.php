<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cherry+Swash:700" rel="stylesheet">
   

    <!-- Styles -->
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    
  <title>Login</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="main-content-wrapper" >
        <h1>
            {{ __('Login') }}
        </h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="info">
                <label for="name" class=""></label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <label for="password" class="">{{ __('') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="info-under">
                <div class="remember">
                    <label><input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></label>
                    <label class="remember-me" for="remember">{{ __('Remember Me') }}</label>
                </div>     
                <button type="submit" class="button">{{ __('Login') }}</button>
            </div>
    </div>
</div>
@endsection
