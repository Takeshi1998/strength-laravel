<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-wrapper"> 
            <nav class="main-nav">          
                <span><span class="word-orange">S</span><span class="page-number">T</span>RENGT<span class="page-number">H</span></span>
            </nav>
            <nav class="sub-nav">
                        @guest
                            <li class="nav-item">
                                <a class="sub-nav-title" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="sub-nav-title" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @endguest
            </nav>
            <div class="hamburger">
    <input type="checkbox" id="hamburger-check" class="hamburger-hidden" >
      <label for="hamburger-check" class="hamburger-open"><span></span></label>
      <nav class="hamburger-content">
                        @guest
                            <li class="hamburger-item">
                                <a class="hamburger-item-name" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="hamburger-item">
                                    <a class="hamburger-item-name" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @endguest
            </nav>
    </div>  
        </div>
    </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
