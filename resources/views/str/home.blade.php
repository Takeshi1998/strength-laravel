
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
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    
  <title>みんなの記録</title>
</head>
<body>

<div class="header">
    <div class="header-wrapper">
        <nav class="main-nav">
            <span><span class="word-orange">S</span><span class="page-number">T</span>RENGT<span class="page-number">H</span></span>
        </nav>
        <nav class="sub-nav">    
                    <a  class="sub-nav-title" href="./tweet">記録する</a>
      
                <a class="sub-nav-title" href="./person">{{Auth::user()->name}}の記録</a>
     
                    <a class="sub-nav-title" href="#">筋トレのすゝめ</a>
        </nav>
        <div class="hamburger">
    <input type="checkbox" id="hamburger-check" class="hamburger-hidden" >
      <label for="hamburger-check" class="hamburger-open"><span></span></label>
      <nav class="hamburger-content">
        <ul class="hamburger-list">
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./tweet">記録する</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./person">{{Auth::user()->name}}の記録</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="#">筋トレのすゝめ</a>
          </li>
          </li>
        </ul>
      </nav>
    </div>
    </div>
</div>  
<!-- 一覧 -->

<main class="home">
    <div class="home-wrapper">
    <h1><span class="word-orange">H</span>OME<span class="page-number">{{$comments->currentPage()}}</span></h1>
    
        @foreach($comments as $comment)
        <ul class="home-list">
          <div class="home-list-header">
            {{$comment->name}}
          </div>
            <li class="home-list-content-left">
              {!! nl2br(e($comment->tweet))!!}
            </li>
            <li class="home-list-content-right">
               {{$comment->zikan}}
            </li>
        </ul> 
          @endforeach  
    </div>
    <span class="page-end">{{$comments->links()}}</span>
</main>



    
</body>
</html>