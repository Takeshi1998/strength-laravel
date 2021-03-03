<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <title>strength</title>
</head>
<body>
<div class="container">
    {{-- nav --}}
    <div class='fixed-top'>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Strength</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('person')}}">{{Auth::user()->name}}の記録</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">公式Line</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
      {{-- nav --}}

      <main class="pt-3">
          @yield('main')
      </main>
</div>
@yield('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
