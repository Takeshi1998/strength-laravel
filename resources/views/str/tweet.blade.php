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
   

    <!-- Styles -->
    <link href="{{asset('css/tweet.css')}}" rel="stylesheet">
    
  <title>記録する</title>
</head>
<body>

<!-- ヘッダー -->


<div class="header">
    <div class="header-wrapper">
        <nav class="main-nav">
            <span><span class="word-orange">S</span><span class="page-number">T</span>RENGT<span class="page-number">H</span></span>
        </nav>
        <nav class="sub-nav">    
                    <a  class="sub-nav-title" href="./home">みんなの記録</a>
      
                <a class="sub-nav-title" href="./person">{{Auth::user()->name}}の記録</a>
     
                    <a class="sub-nav-title" href="./study">筋トレのすゝめ</a>
        </nav>
        <div class="hamburger">
    <input type="checkbox" id="hamburger-check" class="hamburger-hidden" >
      <label for="hamburger-check" class="hamburger-open"><span></span></label>
      <nav class="hamburger-content">
        <ul class="hamburger-list">
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./home">みんなの記録</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./person">{{Auth::user()->name}}の記録</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./study">筋トレのすゝめ</a>
          </li>
          </li>
        </ul>
      </nav>
    </div>
    </div>
</div>  
<!-- 一覧 -->

<main class="main-content">
  <div class="main-content-wrapper">
      <h1 class="main-content-text">記録を入力</h1>
    <form class="mt-4" method="post" action="./tweet/post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="tweet"></label>
      <textarea class="form-control" id="tweet" rows="6" name="tweet"></textarea>
    </div>
    {{-- <input type="hidden" name="name" value="{{Auth::user()->name}}"> --}}
    <input type="submit" class="btn btn-info " value="記録する">
  </div>
  </form>
  </main>
