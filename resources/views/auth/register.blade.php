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
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
    
  <title>Register</title>
</head>
<body>
@extends('layouts.app')

@section('content')

<div class="register-content">
    <div class="register-content-wrapper">
    <h2>
        {{ __('Register') }}
    </h2>
        <div class="register-info">                
        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <label for="name" class="sub-content-title"></label>
                                <input id="name" type="text" class="register-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="email" class="sub-content-title"></label>
                                <input id="email" type="email" class="register-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="e-mail">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password" class="sub-content-title"></label>
                                <input id="password" type="password" class="register-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password-confirm" class="sub-content-title"></label>
                                <input id="password-confirm" type="password" class="register-form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="password confirm">

                                <button type="submit" class="register-button">
                                    {{ __('Register') }}
                               </button>
                    </form>
        </div>            
    </div>
</div>
@endsection
